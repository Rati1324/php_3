<?php 
    session_start();
    if (isset($_SESSION['again'])) $_SESSION['again']++;
    else $_SESSION['again'] = 1;

    if ($_SESSION['again'] > 1) {
        echo "you cant";
    }
    else {
        require("db.php");
        $db = new db();
        $data = file_get_contents("php://input");
        $answers = json_decode($data, true);
        
        $ids = array_keys($answers);
        $questions = $db->select($ids, "tests");
        $score = 0;
        foreach ($questions as $q) {
            if ($answers[$q["id"]] == $q["answer"]) $score++;
        }
        $_SESSION['score'] = $score;
        if ($score < 3 && !isset($_SESSION['again'])) {
            $_SESSION['again'] = 1;
        }
        $_SESSION['again']++;
        echo $score;
    }