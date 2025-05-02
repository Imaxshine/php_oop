<?php
class Connection{
    public $host = "localhost";
    public $server = "root";
    public $password = "";
    public $db = 'oop';
    public mysqli $conn;
    public function __construct()
    {
        $this->conn = new mysqli($this->host,$this->server,$this->password,$this->db);
        if ($this->conn->connect_error){
            die('Connection failed; ' . $this->conn->connect_error);
        }
    }
    function getConnection():mysqli{
        return $this->conn;
    }
}