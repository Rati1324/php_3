<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        include('classes.php');
        include('db.php');
        include('functions.php');
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

        if (isset($_POST['insert'])){
			$w->insert();
        }

        if (isset($_POST['update'])){
			$w->update();
        }

		if (isset($_POST['remove'])){
			$w->remove();
		}

        if (isset($_GET['select'])){
			$words = Word::get_all_words($db);
            foreach ($words as $word){
                display_word($word->get_english(), $word->get_georgian(), $word->get_id());
            }
            echo "<a href='?'>Insert a new word</a>";
        }
		else{
			display_insert();
		}		
?>
</body>
</html>
