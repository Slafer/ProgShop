<?php
class Database{
    private $host = "localhost";
    private $db_name = "exam";
    private $username = "root";
    private $password = "root";

    public $conn;

    public function getConnection(){
        $this->conn = null;

        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);

        }catch(PDOException $ex){
            echo "Connection error: " . $ex->getMessage();
        }

        return $this->conn;
    }
    public function addImage(string $image)
    {
        $query = "INSERT INTO `test` (`text`) VALUES ('$image')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
    public function test()
    {
        $query = "INSERT INTO 'test' ('text') VALUES ('0x')";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
    }
}
?>