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
                //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->conn = $conn;
            }
            catch (PDOException $e){
                echo "Connection failed: " . $e->getMessage();
            }
        }
        public function execute($query){
            try{
                $this->conn->exec($query);        
            }
            catch (PDOException $e) {
                echo $e->getMessage();
            }
        }

        public function select($query){
            // Maybe add prepared statements later
            $stmt = $this->conn->query("SELECT * FROM word");
            $res = $stmt->fetchAll();
            return $res;
        }

		public function update(){
			$sql = "UPDATE word SET in_english = $this->in_english, in_georgian = $this->in_georgian";
			echo $sql;
		}
}
