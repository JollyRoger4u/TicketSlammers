<?php
echo 'CLASSES LOADED';

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
class TicketHandler
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
	}
	public function writeTicket($eventID)
	{
		//Need to create a ticket and make sure it is unique.
		//unique serial number should handle that
		//adding hash to hide serial number for customer
		//$semi-random = uniqid();
		$relEvent = $eventID;
		$serial = uniqid();
		$used = false;
		$hash = 0;       //TEMP!
		echo $relEvent . "<br>" . $serial . "<br>" . $used . "<br>" . $hash;
	}
}

class User
{

	private $db;

	public function __construct()
	{
		$this->db = new DatabaseConnect();
		$this->db = $this->db->openConnection();
	}

	public function UserLogIn($userName, $userPass)
	{
		if (!empty($userName) && !empty($userPass)) {
			$stmt = $this->db->prepare("select * from users where email=? and password=?");
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
		$sql = "INSERT INTO users (email, firstName, lastName, userPassword)
		VALUES (:email, :firstName, :lastName, :userPassword)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([
			'email' => $usermail,
			'firstName' => $userFName,
			'lastName' => $userLName,
			'userPassword' => $userpass
		]);
	}
}
