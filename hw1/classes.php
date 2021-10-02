<?php
class Word{
    private $in_english;
    private $in_georgian;

    public function __construct($in_english, $in_georgian){
        $this->in_english = $in_english;
        $this->in_georgian = $in_georgian;
    }

    public function get_english(){ return $this->in_english; }
    public function get_georgian(){ return $this->in_georgian; }
    public function set_english($value){ $this->in_english = $value; }
    public function set_georgian($value){ $this->in_georgian = $value; }
}