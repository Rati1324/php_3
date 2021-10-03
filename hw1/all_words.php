<?php

	$words = Word::get_all_words($db);

	if (isset($_POST['remove'])){
		foreach ($words as $k => $v){
			if ($v->get_id() == $_POST['id']){
				$word = $v;
				unset($words[$k]);
			}
		}
		$word->remove();
	}

	else if (isset($_POST['update'])){
		$word = new Word($_POST['id'], $_POST['in_english'], $_POST['in_georgian'], $db);
		echo "fuck";
		$word->update();
	}
	
	foreach ($words as $word){ ?>
		<form action="" method="post" autocomplete="off">    
			<input type="text" name="in_english" value=<?=$word->get_english()?>>
			<input type="text" name="in_georgian" value=<?=$word->get_georgian()?>>
			<input type="hidden" name="id" value=<?=$word->get_id()?>>
			<button name="update">Update</button>
			<button name="remove">Delete</button>
		</form>
<?php } ?>
	
