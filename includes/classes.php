<?php
echo 'CLASSES LOADED';
class DBC  //Data-Base-Connect
{

    function DbConnect()
    {
        $dsn = new PDO(
            "mysql:host=" . _DBHOST . "; dbname=" . _DBNAME,
            _DBUSER,
            _DBPASSWORD

        );
        return $this->dsn;
        echo $this->dsn;
    }
}


class DatabaseConnect
{
    private  $server = "mysql:host=localhost;dbname=ticketslammers";
    private  $user = "root";
    private  $pass = "";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $con;

    public function openConnection()
    {
        try {
            $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);
            echo 'database connected!';
            return $this->con;
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }
    public function closeConnection()
    {
        $this->con = null;
    }
}