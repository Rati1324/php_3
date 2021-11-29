<?php
    require("db.php");
    $db = new db();
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $register_date = Date("Y-m-d H:i:s");

    $exists = 1;
    while ($exists != 0) {
        $number = rand(0, 10000);
        $exists = count($db->check_number($number));
    }

    array_push($data, $register_date);
    array_push($data, $number);

    $fields = ["f_name", "l_name", "dob", "personal_id", "position", "register_date", "number"];

    $db->insert($data, "user", $fields);