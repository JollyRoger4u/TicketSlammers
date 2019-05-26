<?php



$eventID = $_POST['eventID'];
$nr = $_POST['amount'];
$userID = $_POST['userID'];
$purchaseHandler = new TicketHandler;
$purchaseHandler->boughtTicket($eventID, $nr, $userID);



/*$purchaseHandler = new setupPurchase;
$purchaseHandler->makeTicket;
class setupPurchase
{
private $db;

public function __construct()
{
$this->db = new DatabaseConnect();
$this->db = $this->db->openConnection();
}

public function makeTicket($eID)
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
}
/*
$sql = 'SELECT * FROM users WHERE userID ="' . $name . '"';

$result = $conn->query($sql);
$response = array();

if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$response['userID'] = $row["userID"];
$response['firstName'] = $row["firstName"];
}
echo json_encode($response);
} else {
echo " 0 results";
}
$conn->close();
*/
