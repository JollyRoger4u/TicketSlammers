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
			echo "There is some problem in connection: " . $e->getMessage();
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

	public function getAllTickets()
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
		$sql = "INSERT INTO events (ticketName, ticketDsc, ticketPrice, ticketImg, maxTickets, eventDate)
		VALUES (:ticketName, :ticketDsc, :ticketPrice, :ticketImg, :maxTickets, :eventDate)";
		$stmt = $this->db->prepare($sql);
		$stmt->execute([
			'ticketName' => $evName,
			'ticketDsc' => $evDesc,
			'ticketPrice' => $evTicPr,
			'ticketImg' => $evImg,
			'maxTickets' => $evMaxT,
			'eventDate' => $evDat
		]);
	}
}
