<?php
class Database {
    // Single instance
    private static $instance = null;
    private $conn;

    // Database credentials
    private $host = '172.31.22.43';
    private $db   = 'Ichty200626964';
    private $user = 'Ichty200626964';
    private $pass = 'FL9Lv6mKbN';

    // Private constructor
    private function __construct() {
        $dsn = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            // Fail with clear error
            die("Database Connection Failed: " . $e->getMessage());
        }
    }

    // Get the single instance
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Get the PDO connection
    public function getConnection() {
        return $this->conn;
    }
}
?>
