<?php
class PDODatabase extends PDO {
    private $DatabaseType = 'mysql';
    private $Host = 'localhost';
    private $Port = '3307';
    private $User = 'root';
    private $Password = '';
    private $Database = 'barbershop_management';

    public function __construct() {
        $dsn = $this->DatabaseType . ':dbname=' . $this->Database . ";host=" . $this->Host . ";port=" . $this->Port . ";charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            parent::__construct($dsn, $this->User, $this->Password, $options);
        } catch (PDOException $e) {
            die(json_encode(["error" => "Connection failed: " . $e->getMessage()]));
        }
    }
}
?>