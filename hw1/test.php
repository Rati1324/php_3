<?php
class Test
{
	protected $start_date;
	protected $end_date;
	protected $duration;
	protected $score;
	protected $questions = [];
	
	public function __construct($start_date, $end_date=null, $duration=null, $score=null, $num_of_q, $db){
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->duration = $duration;
		$this->score = $score;
		$this->db = $db;
		$this->generate_questions($num_of_q);
	}

	public function set_end_date($value){ $this->end_date = $value; }
	public function set_duration($end_date){ $this->duration = $end_date - $this->start_date; }

	public function generate_questions($num_of_q){
		for ($i = 0; $i < $num_of_q; $i++){
			$words = $this->db->select("SELECT in_english, in_georgian FROM word ORDER BY rand() LIMIT 4");

			$answer = $words[rand(0, count($words)-1)];
			$question = "Find the english word for " . $answer['in_georgian'];
			$options = array_map(function ($x) {return $x['in_english'];}, $words);
			$q = new Question($question, $options, $answer['in_georgian']);
			$this->questions[] = $q;
		}
		foreach ($this->questions as $v){
			echo $v->get_question();
			echo "<br>";
			echo $v->get_answer();
			echo "<br>";
		}
	}

}

class Question
{
	private $question;
	private $options;
	private $answer;

	public function __construct($question, $options, $answer){
		$this->question = $question;
		$this->options = $options;
		$this->answer = $answer;
	}
	
	public function get_question(){ return $this->question; }
	public function get_options(){ return $this->options; }
	public function get_answer(){ return $this->answer; }

	public function check_answer($answer){
		return $this->answer = $answer;
	}

}
