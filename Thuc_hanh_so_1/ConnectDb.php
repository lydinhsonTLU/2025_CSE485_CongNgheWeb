<?php
class Database {
    private $host = "127.0.0.1";
    private $db   = "cse485_php_mysql";
    private $user = "root";
    private $pass = "";
    private $charset = "utf8mb4";

    private $pdo;

    public function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset={$this->charset}";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }

    public function getConnection() {
        return $this->pdo;
    }
}

class Manager {
    private $pdo;

    public function __construct(Database $db) {
        $this->pdo = $db->getConnection();
    }

    // READ ALL
    public function getAllAccount() {
        $sql = "SELECT * FROM th1_csv_accounts limit 70";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllQuiz() {
        $sql = "SELECT * FROM th1_quiz";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getAllFlowers() {
        $sql = "SELECT * FROM th1_flowers";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    
}
?>
