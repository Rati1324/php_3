<?php 
	require("db.php");
	require("word.php");
	$db = new Database("localhost", "rati");

	$json = file_get_contents("php://input");
	$data = json_decode($json, true);
	$w = new Word(in_english: $data['in_english'], in_georgian: $data['in_georgian'], db: $db);
	$w->insert();
	print_r($data);