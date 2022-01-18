<?php
require('db.php');
$db = new db();
$data = file_get_contents("php://input");
$data = json_decode($data, true);
$users = $db->select($data['key'], $data['col']);

echo json_encode($users);
