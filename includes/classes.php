<?php

function test($a, $b)
{
	echo ($a + $b);
}


class DatabaseConnect
{
	private  $server = "mysql:host=localhost;dbname=ticketslammers";
	private  $user = "root";
	private  $pass = "";
	private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
	protected $pdo;


	public function openConnection()
	{
		try {
			$this->pdo = new PDO($this->server, $this->user, $this->pass, $this->options);
			return $this->pdo;
		} catch (PDOException $e) {
			echo "There is some problem with the connection: " . $e->getMessage();
		}
	}
	public function closeConnection()
	{
		$this->pdo = null;
	}
}

class TicketHandler     //Handles all calls that has to do with tickets and events.
{

	private $db;

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}

	public function getAllEvents()
	{
		$stmt = $this->db->prepare("select * FROM events");
		$stmt->execute();
		$row = $stmt->fetchAll();
		return $row;
	}

	public function writeEvent(
		$eventName,
		$eventDate,
		$ticketPrice,
		$newEventImg,
		$eventDescription,
		$eventMaxTickets
	) {
		$evName = $eventName;
		$evDat = $eventDate;
		$evTicPr = $ticketPrice;
		$evImg = $newEventImg;
		$evDesc = $eventDescription;
		$evMaxT = $eventMaxTickets;
		try {
			$sql = "INSERT INTO events (eventName, eventDsc, ticketPrice, eventImg, maxTickets, eventDate)
		VALUES (:eventName, :eventDsc, :ticketPrice, :eventImg, :maxTickets, :eventDate)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([
				'eventName' => $evName,
				'eventDsc' => $evDesc,
				'ticketPrice' => $evTicPr,
				'eventImg' => $evImg,
				'maxTickets' => $evMaxT,
				'eventDate' => $evDat
			]);
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}

	public function boughtTicket($eventID, $nr, $userID)
	{
		$i = 0;
		while ($i <= $nr) {
			$tickSerial = uniqid();
			$tickHash = password_hash($tickSerial, PASSWORD_DEFAULT);
			try {
				$sql = "INSERT INTO tickets (eventID, tickSerial, tickHash, userID)
		VALUES (:eventID, :tickSerial, :tickHash, :userID)";
				$stmt = $this->db->prepare($sql);
				$stmt->execute([
					'eventID' => $eventID,
					'tickSerial' => $tickSerial,
					'tickHash' => $tickHash
				]);
			} catch (Exception $e) {
				echo 'Exception -> ';
				var_dump($e->getMessage());
			}
		}
	}

	public function writeTicket($eID)
	{
		echo ('creating ticket');
		$eventID = $eID;
		$tickSerial = uniqid();
		$tickHash = password_hash($tickSerial, PASSWORD_DEFAULT);
		try {
			$sql = "INSERT INTO tickets (eventID, tickSerial, tickHash)
		VALUES (:eventID, :tickSerial, :tickHash)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([
				'eventID' => $eventID,
				'tickSerial' => $tickSerial,
				'tickHash' => $tickHash
			]);
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}
	public function checkTicket($serial)
	{
		try {
			$serialTest = "SELECT * FROM tickets WHERE tickSerial=?";
			$stmt = $this->db->prepare($serialTest);
			$stmt->bindParam(1, $serial);
			$stmt->execute();
			$result = $stmt->fetch();
			if ($result) {
				switch ($result['used']) {
					case 0:
						echo "Ticket is not used";
						break;
					case 1:
						echo "Ticket is used";
						break;
					default:
						echo "Something went wrong, please check ticket serial number";
						break;
				}
			} else {
				echo "Something went wrong, please check ticket serial number";
			}
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}
}
class CookieHandler
{
	private $db;
	private $userCookieName = "TSUser";
	private $infoCookie = "hideWarning";

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}
	public function bakeCookie($userData)
	{
		$userID = $userData['userID'];
		$hashedID = password_hash($userID, PASSWORD_DEFAULT);
		try {
			$updateCookieHash = "UPDATE users SET cookieHash='$hashedID' WHERE userID='$userID'";
			$sql = $this->db->prepare($updateCookieHash);
			$sql->execute();
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}


		setcookie($this->userCookieName, $userID, time() + (24 * 60 * 60 * 1000), '/');
	}
	public function checkCookie($cookieHash)
	{
		$hashCompare = "SELECT * FROM users WHERE cookieHash=?";
		$stmt = $this->db->prepare($hashCompare);
		$stmt->bindParam(1, $cookieHash);
		$stmt->execute();
		$result = $stmt->fetch();
		$_SESSION = $result;
	}
	public function cookieInfoCookie()
	{
		setcookie($this->infoCookie, 1, time() - (24 * 60 * 60 * 1000), '/');
	}
	public function eatCookie()
	{
		setcookie($this->userCookieName, "", time() - (24 * 60 * 60 * 1000), '/');
	}
}

class User              //Handles all Database interaction with Users
{

	protected $db;

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}

	public function UserLogIn($userMail, $userPass)
	{
		if (!empty($userMail) && !empty($userPass)) {
			$stmt = $this->db->prepare("select * from users where email=?");
			$stmt->bindParam(1, $userMail);
			$stmt->execute();
			$result = $stmt->fetch();

			if ($result['email'] === $userMail) {
				$hash = $result['userHash'];
				if (password_verify($userPass, $hash)) {
					echo '<p style="color: white; font-size: 40px; text-align: center;"> -------> ACCESS GRANTED <------- </p>';
					echo "welcome" . $result['firstName'];
					$loginCookie = new CookieHandler();
					$loginCookie->bakeCookie($result);
					return true;
				} else {
					echo '<p style="color: white; font-size: 40px; text-align: center;">Incorrect username or password</p>';
					return false;
				}
			} else {
				echo '<p style="color: white; font-size: 40px; text-align: center;">enter username and password plixx</p>';
				return false;
			}
		}
	}
	public function logout()
	{
		session_destroy();
	}
	public function editUser($userID, $usermail, $userpass, $userFName, $userLName)
	{
		$currentUser = $userID;
		$userm = $usermail;
		$userp = $userpass;
		$userHash = password_hash($userpass, PASSWORD_DEFAULT);
		$userF = $userFName;
		$userL = $userLName;
		try {
			$sql = "UPDATE users SET email=?, firstName=?, lastName=?, userPassword=?, userHash=? WHERE userID=?";

			$stmt = $this->db->prepare($sql);
			$stmt->execute([$userm, $userF, $userL, $userp, $userHash, $currentUser]);
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}
	public function newUser($usermail, $userpass, $userFName, $userLName)
	{
		$userm = $usermail;
		$userp = $userpass;
		$userHash = password_hash($userpass, PASSWORD_DEFAULT);
		$userF = $userFName;
		$userL = $userLName;
		try {
			$sql = " INSERT INTO users(email, firstName, lastName, userHash)
			VALUES(: email,:firstName,:lastName,:userHash )";
			$stmt = $this->db->prepare($sql);
			$stmt->bindParam(':email', $userm, PDO::PARAM_STR);
			$stmt->bindParam(':firstName', $userF, PDO::PARAM_STR);
			$stmt->bindParam(':lastName', $userL, PDO::PARAM_STR);
			$stmt->bindParam(':userHash', $userHash, PDO::PARAM_STR);
			$stmt->execute();
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}
}
