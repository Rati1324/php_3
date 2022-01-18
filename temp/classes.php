<?php
class Robot
{
    public function greet() {
        return 'hello!';
    }
}

class Android extends Robot
{
    public function greet() {
        echo parent::greet();
        return 'Hi';
    }
}

$x = new Android();
echo $x->greet();