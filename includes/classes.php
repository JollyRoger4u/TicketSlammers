<?php

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

	public function getAllEvents()  //Grabs all events from database and provide the data
	{
		$stmt = $this->db->prepare("SELECT * FROM events");
		$stmt->execute();
		$row = $stmt->fetchAll();
		return $row;
	}
	public function eventIdentifier($id) //returns the data of the event ID provided.
	{

		$stmt = $this->db->prepare("SELECT * FROM events WHERE eventID=?");
		$stmt->bindParam(1, $id);
		$stmt->execute();
		$result = $stmt->fetch();
		return $result;
	}
	public function allOwnedTickets($user) //returns all tickets from database that has the correct userID
	{
		$stmt = $this->db->prepare("SELECT * FROM tickets WHERE userID=?");
		$stmt->bindParam(1, $user);
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}

	public function writeEvent(   //Creates a new event fromt he admin area
		$eventName,
		$eventDate,
		$ticketPrice,
		$newEventImg,
		$eventDescription,
		$eventMaxTickets
	) {
		$evName = filter_var($eventName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$evDat = filter_var($eventDate, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$evTicPr = filter_var($ticketPrice, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$evImg = filter_var($newEventImg, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$evDesc = filter_var($eventDescription, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$evMaxT = filter_var($eventMaxTickets, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
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

	public function boughtTicket($eventID, $nr, $userID) //Creates a ticket for the event that the customer has indicated in the shopping area
	{
		$i = 1;
		while ($i <= $nr) {
			$tickSerial = uniqid();
			$tickHash = password_hash($tickSerial, PASSWORD_DEFAULT);
			$eventInfo = $this->eventIdentifier($eventID);
			if ($eventInfo['soldTickets'] >= $eventInfo['maxTickets']) {
				echo "Sorry, the tickets are sold out!";
				die;
			}
			try {
				$sql = "INSERT INTO tickets (eventID, tickSerial, tickHash, userID)
		VALUES (:eventID, :tickSerial, :tickHash, :userID)";
				$stmt = $this->db->prepare($sql);
				$stmt->execute([
					'eventID' => $eventID,
					'tickSerial' => $tickSerial,
					'tickHash' => $tickHash,
					'userID' => $userID
				]);

				$newTotal = $eventInfo['soldTickets'];
				$newTotal++;
				$updateSold = "UPDATE events SET soldTickets='$newTotal' WHERE eventID='$eventID'";
				$sql = $this->db->prepare($updateSold);
				$sql->execute();
			} catch (Exception $e) {
				echo 'Exception -> ';
				var_dump($e->getMessage());
			}
			$i++;
		}
		return true;
	}

	public function writeTicket($eID)   //Creates a ticket from the admin area (currently pretty useless)
	{
		echo ('creating ticket');
		$eventID = $eID;
		$tickSerial = substr(uniqid(rand(), 1), 0, 7);
		$tickHash = password_hash($tickSerial, PASSWORD_DEFAULT);
		$tickSecret = substr(uniqid(rand(), 1), 0, 7);
		//failsafe in case uniqid fails to create a unique ticketSerial
		try {
			$stmt = $this->db->prepare("SELECT * FROM tickets WHERE tickSerial=?");
			$stmt->bindParam(1, $tickSerial);
			$stmt->execute();
			$result = $stmt->fetch();
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
		if (!empty($result)) {
			$tickSerial = substr(uniqid(rand(), 1), 0, 7);
			$tickHash = password_hash($tickSerial, PASSWORD_DEFAULT);
		}

		try {
			$sql = "INSERT INTO tickets (eventID, tickSerial, tickHash, tickSecret)
		VALUES (:eventID, :tickSerial, :tickHash :tickSecret)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([
				'eventID' => $eventID,
				'tickSerial' => $tickSerial,
				'tickHash' => $tickHash,
				'tickSecret' => $tickSecret
			]);
			echo "ticket Created";
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}
	public function checkTicket($serial) //checks ticket serial against database for confirmation that the ticket is correct
	{

		try {

			$stmt = $this->db->prepare("SELECT * FROM tickets WHERE tickSerial=?");
			$stmt->bindParam(1, $serial);
			$stmt->execute();
			$result = $stmt->fetch();
			if ($result) {
				switch ($result['used']) {
					case 0:
						echo "Ticket is not used and is a valid ticket";
						break;
					case 1:
						echo "Ticket is used and is a valid ticket";
						break;
					default:
						echo "OH DEAR! Something went wrong, please check ticket serial number";
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
class CookieHandler     //Handles all PHP interactions with the cookies
{
	private $db;
	private $userCookieName = "TSUser";
	private $infoCookie = "hideWarning";

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}

	public function bakeCookie($userData)  //Saved the cookiehash of the current user. (not implemented correctly atm)
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
	public function checkCookie($userID) 		//saves user data to $_SESSION for easy access
	{
		$checkUser = "SELECT * FROM users WHERE userID=?";
		$stmt = $this->db->prepare($checkUser);
		$stmt->bindParam(1, $userID);
		$stmt->execute();
		$result = $stmt->fetch();
		$_SESSION = $result;
	}
	public function cookieInfoCookie()			//Creates the cookie responsible remembering accepting cookies
	{
		setcookie($this->infoCookie, 1, time() - (24 * 60 * 60 * 1000), '/');
	}
	public function eatCookie()					//Empies user Cookie
	{
		setcookie($this->userCookieName, "", time() - (24 * 60 * 60 * 1000), '/');
	}
}

class User              						//Handles all Database interaction with Users
{

	protected $db;

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}

	public function UserLogIn($userMail, $userPass)		//Handles user loginrequests
	{
		$userMail = filter_var($userMail, FILTER_SANITIZE_EMAIL);
		$userPass = filter_var($userPass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
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
	public function logout()        //Handles logout, clears the session
	{
		session_destroy();
	}
	public function editUser($userID, $userpass, $userFName, $userLName)  //handles requests to change saved user data
	{
		$currentUser = $userID;
		$userp = filter_var($userpass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$userHash = password_hash($userp, PASSWORD_DEFAULT);
		$userF = filter_var($userFName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$userL = filter_var($userLName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		try {
			$sql = "UPDATE users SET firstName=?, lastName=?, userHash=? WHERE userID=?";

			$stmt = $this->db->prepare($sql);
			$stmt->execute([$userF, $userL, $userHash, $currentUser]);
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}

	public function newUser($usermail, $userpass, $userFName, $userLName) 		//Creates a new user in the database, also sends request to check for  already existing email
	{
		$userm = filter_var($usermail, FILTER_SANITIZE_EMAIL);
		$userpass = filter_var($userpass, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$userHash = password_hash($userpass, PASSWORD_DEFAULT);
		$userF = filter_var($userFName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$userL = filter_var($userLName, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
		$mailTested = $this->checkEmailUnique($userm);
		if ($mailTested == true) {
			try {
				$sql = "INSERT INTO users (email, firstName, lastName, userHash)
			VALUES(:email,:firstName,:lastName,:userHash)";
				$stmt = $this->db->prepare($sql);
				$stmt->execute([
					'email' => $userm,
					'firstName' => $userF,
					'lastName' => $userL,
					'userHash' => $userHash
				]);
			} catch (Exception $e) {
				echo 'Exception -> ';
				var_dump($e->getMessage());
			}
		} else {
			echo "<p style = 'color: red; text-align: center; font-size: 24px;'>Email already in use</p>";
		}
	}
	public function checkEmailUnique($mail)  //Checks if requested email already exists in database
	{
		$stmt = $this->db->prepare("SELECT * FROM users WHERE email=?");
		$stmt->bindParam(1, $mail);
		$stmt->execute();
		$data = $stmt->fetchAll();
		if (!empty($data)) {
			return false;
		} else {
			return true;
		}
	}
}
