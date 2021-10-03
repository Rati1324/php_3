<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
		<a href='?page=display_words'>Display words</a>
		<a href='?page=insert'>Insert</a>
		<a href='?page=test'>Take a test</a>    
<?php
        include('classes.php');
        include('db.php');
        $db = new Database("localhost", "rati", "123456");
		
		function set_variables(){
			$in_georgian = $_POST['in_georgian'];
			$in_english = $_POST['in_english'];
			return [$in_georgian, $in_english];
		}

		if (!empty($_POST)){
			if (isset($_POST['id'])){
				$w = new Word($_POST['id'], $_POST['in_english'], $_POST['in_georgian'], $db);	
			}
			else {
				$w = new Word(in_english: $_POST['in_english'], in_georgian: $_POST['in_georgian'], db: $db);
			}
		}

		if (isset($_GET['page'])){
			switch($_GET['page']){
				case 'display_words':
					$words = Word::get_all_words($db);
					include('all_words.php');
					break;
				case 'insert':
					include('insert_word.html');
					break;
				case 'test':
					include('test.php');
					break;
			}
		}

		else if (isset($_POST['update'])){
			$w->update();
        }


        		
?>
</body>
</html>
