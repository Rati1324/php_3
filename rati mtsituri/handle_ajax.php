<?php 
    require("db.php");
    $db = new db();
    $json = file_get_contents("php://input");
    $answers = json_decode($json);
    $questions = $db->select("tests");
    foreach ($questions as $i => $q) {
        $q["option_" . $q["answer"]] == $answers;
    }