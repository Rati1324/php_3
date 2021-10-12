<?php
    class Database{
        private $servername;
        private $username;
        private $conn;

        function __construct($servername, $username, $password = "123456"){
            $this->servername = $servername;
            $this->username = $username;
            try {
                $conn = new PDO("mysql:host=$servername;dbname=dictionary", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn = $conn;
            }
            catch (PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }
        public function get_conn(){ return $this->conn; }
		//Maybe useless??
        public function execute($query){
            try{
                $this->conn->exec($query);        
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

		// remember to pass the query when you want all of them
        public function select($query){
            // Maybe add prepared statements later
            $stmt = $this->conn->query($query);
            $res = $stmt->fetchAll();
            return $res;
        }
		
		public function last_id($table){
			$sql = "SELECT MAX(id) FROM $table";
			$stmt = $this->conn->query($sql);
			$data = $stmt->fetchAll();
			return $data[0][0];
		}
}
