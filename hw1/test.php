<?php
class Test
{
	protected $start_date;
	protected $end_date;
	protected $duration;
	protected $score;
	protected $questions;
	
	public function __construct($questions, $start_date, $end_date=null, $duration=null, $score=null){
		$this->questions = $questions;
		$this->start_date = $start_date;
		$this->end_date = $end_date;
		$this->duration = $duration;
		$this->score = $score;
	}

	public function set_end_date($value){ $this->end_date = $value; }
	public function set_duration($end_date){ $this->duration = $end_date - $this->start_date; }

}

class Question extends Test
{
	private $question;
	private $options;
	private $answer;

	public function get_question(){ return $this->question; }
	public function get_options(){ return $this->options; }
	public function get_answer(){ return $this->answer; }
	public function __construct($question, $options, $answer){
		$this->question = $question;
		$this->options = $options;
		$this->answer = $answer;
	}
	
	public function check_answer($answer){
		return $this->answer = $answer;
	}

}
