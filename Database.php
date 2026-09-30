<?php 
class Database {
    private $host = "localhost";
    private $db_name = "agenda_db_carla";
    private $username = "root";
    private $passworrd = "";
    private $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn =new PDO(
                "mysql:host" . $this->host . ";dbname=" . $this->db_name,
                $this->username,
                $this->password
            );
            $this->conn->setAttribute(PDO::ATT_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexion:" . $exception->getMessage(); 
        } 

        return $this->conn;
        
    }
}
?>