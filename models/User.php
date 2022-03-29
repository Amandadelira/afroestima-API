<?php 
require ('helpers/database.php');
class User{
    public $id;
    public $name;
    public $email;
    public $pass;
    function __construct($id, $name, $email, $pass) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->pass = $pass;
    }
    function create(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("INSERT INTO users (name, email, pass)
            VALUES (:name, :email, :pass)");
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            echo 'Cadastrado com sucesso!';
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function delete(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("DELETE FROM users where id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            echo 'Deletado com sucesso!';
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function Update(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("UPDATE users SET name = :name, email = :email, pass = :pass WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':pass', $this->pass);
            $stmt->execute();
            echo "Atualizado com sucesso!";
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    function selectAll(){
        $db = new DataBase();
        try {
            $stmt = $db->conn->prepare("SELECT * FROM users;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print_r($result);
        }catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>