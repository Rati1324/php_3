<?php
class Word{
	private $id;
    private $in_english;
    private $in_georgian;
	private $conn;
	private $db;
	
    public function __construct($id=null, $in_english, $in_georgian, $db){
		$this->id = $id;
        $this->in_english = $in_english;
        $this->in_georgian = $in_georgian;
		$this->db = $db;
    }

    public function get_english(){ return $this->in_english; }
    public function get_georgian(){ return $this->in_georgian; }
    public function set_english($value){ $this->in_english = $value; }
    public function set_georgian($value){ $this->in_georgian = $value; }
	public function get_id(){ return $this->id; }

	public static function get_all_words($db){
		$words = $db->select("SELECT * FROM word");
		$word_objs = [];
		foreach ($words as $w){
			$word_objs[] = new Word($w['id'], $w['in_english'], $w['in_georgian'], $db);
		}
		return $word_objs;
	}

    public function insert(){
		$sql = "INSERT INTO word VALUES(NULL, :in_english, :in_georgian)";
		$stmt = $this->db->get_conn()->prepare($sql); //Compilation
		$stmt->bindParam(':in_english', $this->in_english);
		$stmt->bindParam(':in_georgian', $this->in_georgian);
		$stmt->execute();
    }

	public function remove(){
		$sql = "DELETE FROM word WHERE id = $this->id";
		$this->db->execute($sql);
	}

	public function update(){
		$sql = "UPDATE word SET in_english = '$this->in_english', in_georgian = '$this->in_georgian' WHERE id = $this->id";
		$this->db->execute($sql);
	}
}

