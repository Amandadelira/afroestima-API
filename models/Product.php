<?php 
class Product{
    public $id;
    public $photo;
    public $title;
    public $price;
    function __construct($id, $photo, $title, $price) {
        $this->id = $id;
        $this->photo = $photo;
        $this->title = $title;
        $this->price = $price;
    }
    function create(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("INSERT INTO products (photo, title, price)
            VALUES (:photo, :title, :price)");
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':price', $this->price);
            $stmt->execute();
            $id = $db->conn->lastInsertId();
            return $id;
        }catch(PDOException $e) {
            $result['message'] = "Error Select All User: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function delete(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("DELETE FROM products where id = :id");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            $result['message'] = "Error Delete Product : " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function update(){
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("UPDATE products SET photo = :photo, title = :title, price = :price WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':photo', $this->photo);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':price', $this->price);
            $stmt->execute();
            return true;
        }catch(PDOException $e) {
            $result['message'] = "Error Select All User:" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function selectAll(){
        $db = new DataBase();
        try {
            $stmt = $db->conn->prepare("SELECT * FROM products;");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            $result['message'] = "Error Select All product: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
    function selectById(){
        $db = new DataBase();
        try {
            $stmt = $db->conn->prepare("SELECT * FROM products WHERE id = :id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Select by id: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}
?>