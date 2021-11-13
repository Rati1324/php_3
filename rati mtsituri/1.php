<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    require("db.php");
    $db = new db();
    $test = $db->select();
    $random_tests = [];
    $used = [];
	while (count($random_tests) < 7) {
		$rand_num = rand(0, count($test) - 1);
		if (!in_array($rand_num, $random_tests)) {
			$random_tests[] = $test[$rand_num];
			$used[] = $rand_num;
		}
	}
	print_r($random_tests);
	echo count($random_tests);
?>
<body>
    <form action="" method="post">
        <div>
        
            <span></span>

        </div>
    </form>
</body>
</html>
