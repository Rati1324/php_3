<?php

	$words = Word::get_all_words($db);
	function find_word($words, $id){
		foreach ($words as $k => $v){
			if ($v->get_id() == $_POST['id']){
				return $k;
			}
		}
	}

	if (isset($_POST['remove'])){
		$word_index = find_word($words, $_POST['id']);
		$word = $words[$word_index];
		$word->remove();
		unset($words[$word_index]);
	}

	else if (isset($_POST['update'])){
		$word_index = find_word($words, $_POST['id']);
		$word = $words[$word_index];
		$word->set_english($_POST['in_english']);
		$word->set_georgian($_POST['in_georgian']);
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
	
