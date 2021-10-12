<?php
class Test
{
	protected $id;
	protected $start_date;
	protected $end_date;
	protected $duration;
	protected $score;
	protected $questions = [];
	
	public function __construct($id=null, $start_date, $end_date=null, $duration=null, $score=null, $db){
		$this->id = $id;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->duration = $duration;
		$this->score = $score;
		$this->db = $db;
	}

	public function get_id(){ return $this->id; }
	public function set_end_date($value){ $this->end_date = $value; }
	public function set_duration($end_date){ $this->duration = $end_date - $this->start_date; }
	public function get_questions(){ return $this->questions; }

	public function generate_questions($num_of_q){
		for ($i = 0; $i < $num_of_q; $i++){
			$words = $this->db->select("SELECT in_english, in_georgian FROM word ORDER BY rand() LIMIT 4");
			$answer = $words[rand(0, count($words)-1)];
			$question = "Find the english word for " . $answer['in_georgian'];
			$options = array_map(function ($x) {return $x['in_english'];}, $words);
			$last_id = $this->db->last_id('question') + 1;
			$q = new Question($last_id, $question, $options, $answer['in_georgian'], $this->db);
			//$q->insert();
			$this->questions[] = $q;
		}
	}

	public function insert(){
		$sql = "INSERT INTO test VALUES(NULL, '$this->start_date', NULL, NULL, NULL)";
		//echo $sql;
		$this->db->execute($sql);
	}
}

class Question 
{
	protected $id;
	private $question;
	private $options;
	private $answer;
	private $db;

	public function __construct($id=null, $question, $options, $answer, $db){
		$this->id = $id;
		$this->question = $question;
		$this->options = $options;
		$this->answer = $answer;
		$this->db = $db;
	}
	
	public function get_id(){ return $this->id; }
	public function get_question(){ return $this->question; }
	public function get_options(){ return $this->options; }
	public function get_answer(){ return $this->answer; }

	public function check_answer($answer){
		return $this->answer = $answer;
	}

	public function insert(){
		$option1 = $this->options[0];
		$option2 = $this->options[1];
		$option3 = $this->options[2];
		$option4 = $this->options[3];
		$sql = "INSERT INTO question VALUES($this->id, '$this->question', '$option1', '$option2', '$option3', '$option4', '$this->answer')";
		$this->db->execute($sql);
	}
}

