<?php
  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'my_blog';
    private $username = 'admin';
    private $password = '1';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $this->conn = new PDO($dsn, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }
