<?php
// Implement a database class that works for any table and parameters [x] 
// Select [x]
// Insert [x]
// Delete [x]
// Update [x]
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
	
	public function select($id, $table) {
		$stmt = $this->conn->prepare("SELECT * FROM $table WHERE id = :id");
		$stmt->bindParam(':id', $id);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
		return $data;
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

	public function delete2($id, $table) {
		$query = "DELETE FROM $table WHERE id = $id";
		$this->conn->exec($query);
	}

	public function update($id, $data, $table, $fields) {
		$query = "UPDATE $table set ";
		$comma = ", ";
		foreach ($fields as $index => $f) {
			if ($index == count($fields) - 1)
				$comma = " ";
			$query .= "$f=:$f" . $comma;
		}
		$query .= "WHERE id=$id";
		$stmt = $this->conn->prepare($query);
		foreach ($data as $index => $d) {
			$stmt->bindParam(":$fields[$index]", $data[$index]);
		}
		$stmt->execute();
	}	
}

