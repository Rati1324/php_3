<?php 
    require('db.php');
    $db = new db();
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $reg_date = date("Y-m-d H:i:s");

    $db->update($data);