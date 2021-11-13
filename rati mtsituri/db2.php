<?php
// Implement a database class that works for any table and parameters.  

class db 
{ 
	private $servername = "localhost";
	private $db = "dictionary";
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

	public function insert($data, $table, $fields) {
		$cols = " (" . implode(", ", $fields) . ")";
		$vals = " VALUES (:" . implode(", :", $fields) . ")";

		$sql = "INSERT INTO $table ";
		$sql .= $cols . $vals;

		$stmt = $this->conn->prepare($sql);
		for ($i = 0; $i < count($data); $i++) {
			$stmt->bindparam(":" . $fields[$i], $data[$i]);
		}
		$stmt->execute();
	}

	//public function insert($in_georgian, $in_english) {
	//	$sql = "INSERT INTO word (in_georgian, in_english) VALUES (:in_english, :in_georgian)";
	//	$stmt = $this->conn->prepare($sql);
	//	$stmt->bindParam(':in_english', $in_english);
	//	$stmt->bindParam(':in_georgian', $in_georgian);
	//	$stmt->execute();
	//}

	public function delete2($id, $table) {
		$query = "DELETE FROM $table WHERE id = $id";
		$this->conn->exec($query);
	}

	public function update($id, $in_georgian, $in_english) {
		$query = "UPDATE word set id=$id, in_georgian='$in_georgian', in_english='$in_english' WHERE id = $id";
		$this->conn->exec($query);
	}	

	public function select($id) {
		$stmt = $this->conn->prepare("SELECT * FROM word WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
		print_r($data);
	}
}

