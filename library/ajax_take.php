<?php 
	require("db.php");
	$json = file_get_contents("php://input");
	if (empty($json)) {
		echo "fuck you";
	}
	else {
		$data = json_decode($json, true);
		print_r($data);
	}
