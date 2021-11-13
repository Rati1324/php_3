<?php

class db 
{ 
	private $servername = "localhost";
	private $db = "test";
	private $username = "rati";
	protected $conn;

	public function __construct() {
		try {
			$this->conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, "123456");
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		catch(PDOException $e) {
			echo "Failed" . $e->getMessage();
		}
	}

	public function select() {
		$stmt = $this->conn->prepare("SELECT * FROM tests");
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
        return $data;
	}
}

