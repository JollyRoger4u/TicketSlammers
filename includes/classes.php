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
	public function writeTicket($eID)
	{

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
}

class User                               //Handles all Database interaction with Users
{

	protected $db;

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}

	public function UserLogIn($userName, $userPass)
	{
		if (!empty($userName) && !empty($userPass)) {
			$stmt = $this->db->prepare("select * from users where email=? and userPassword=?");
			$stmt->bindParam(1, $userName);
			$stmt->bindParam(2, $userPass);
			$stmt->execute();
			$result = $stmt->fetch();

			if ($result['email'] == $userName && $result['userPassword'] == $userPass) {
				$userObj = $stmt->fetch();
				echo "Correct login, ACCESS GRANTED";
				echo "welcome" . $userObj['firstName'];
				$_SESSION['sessionID'] = $result['userID'];
			} else {
				echo "Incorrect username or password";
			}
		} else {
			echo "enter username and password plixx";
		}
	}
	public function logout()
	{
		session_destroy();
	}

	public function newUser($usermail, $userpass, $userFName, $userLName)
	{
		$userm = $usermail;
		$userp = $userpass;
		$userHash = password_hash($userpass, PASSWORD_DEFAULT);
		$userF = $userFName;
		$userL = $userLName;
		try {
			$sql = "INSERT INTO users (email, firstName, lastName, userPassword, userHash)
		VALUES (:email, :firstName, :lastName, :userPassword, :userHash)";
			$stmt = $this->db->prepare($sql);
			$stmt->execute([
				'email' => $userm,
				'firstName' => $userF,
				'lastName' => $userL,
				'userPassword' => $userp,
				'userHash' => $userHash
			]);
		} catch (Exception $e) {
			echo 'Exception -> ';
			var_dump($e->getMessage());
		}
	}
}
