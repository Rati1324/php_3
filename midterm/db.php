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
		$stmt->setFetchMode(PDO::FETCH_ASSOC);
		$data = $stmt->fetchAll();
		return $data;
	}

	// do this without prepared statements
	public function select($key="", $col="") {
		if (empty($key)) {
			$query = "SELECT * FROM user";
			$data = $this->conn->query($query);
			$data = $data->fetchAll();
		}
		else {
			$query = "SELECT * FROM user WHERE $col=$key";
			$stmt = $this->conn->prepare($query);
			$stmt->bindParam(':col', $col);
			$stmt->bindParam(':key', $key);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC);
			$data = $stmt->fetchAll();
		}
		return $data;
	}

	public function insert($data, $table, $fields) {
		
	}

	public function update($fields) {
		$query = "UPDATE user set f_name=?, l_name=?, dob=?, personal_id=?, position=? WHERE id=?";
		$stmt = $this->conn->prepare($query);
		echo $fields['id'];
		$stmt->execute([$fields['f_name'], $fields['l_name'], $fields['dob'], $fields['personal_id'], $fields['position'], $fields['id']]);
	}	
}