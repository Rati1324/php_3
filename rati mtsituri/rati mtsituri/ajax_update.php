<?php 
    $db = new db();
    $data = file_get_contents("php://input");
    $data = json_decode($data, true);
    $id = $data[0];

    $db->update($data[0], $data);