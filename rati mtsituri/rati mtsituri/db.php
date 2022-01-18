<?php 

class db 
{ 
	private $servername = "localhost";
	private $db = "personal";
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
	
	public function check_number($num) {
		$query = "SELECT * FROM user WHERE number = '$num'";
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
		return $data;
	}

	public function select($id=[], $table) {
		$query = "SELECT * FROM $table";
		if (count($id) == 0)
			$stmt = $this->conn->prepare($query);
		else {
			$ids = implode(",", $id);
			$query .= " WHERE id in (" . $ids . ")";
			$stmt = $this->conn->prepare($query);
		}
		$stmt->execute();
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
		return $data;
	}

	public function insert($data, $table, $fields) {
		echo $table;
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

	public function update($data, $fields) {
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