<?php
class Database{
    public $conn;
    function __construct() {
        $servername = "localhost";
        $dbname = "estudosapi";
        $username = "root";
        $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn = $conn;
        } catch(PDOException $e) {
            $result['message'] = "Error Connect DataBase " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}
?>