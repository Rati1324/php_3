<?php 
require("db.php");
$db = new db;
$data = ["en8", "ge8"];
$fields = ["in_georgian", "in_english"];
$table = "word";
$id = 56;
$db->update($id, $data, $table, $fields);

