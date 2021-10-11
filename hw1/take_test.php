<?php 
	include('test.php');	
	$t = new Test(start_date: Date("d-m-Y"), db: $db, num_of_q: 3); 
	$last_insert_id = $db->last_id();
	$t->generate_questions(4);
?>

<form method='post'>
		<?php foreach ($t->get_questions() as $q){ 
			$question_id = $q->get_id();
		?>
			<div class="question"> 
				<span><?=$q->get_question()?> </span>
				<br>
				<?php foreach ($q->get_options() as $o){ ?>
					<label for=<?=$question_id?>><?=$o?></label>
					<input type="radio" name=<?=$q->get_id()?> value=<?=$o?>>
				<?php } ?>
			</div>
		<?php } ?>
</form>
