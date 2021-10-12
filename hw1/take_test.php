<?php 
	include('db.php');
	include('test.php');	
	$db = new Database("localhost", "rati");

	$test_id = $db->last_id('test') + 1;
	$t = new Test(id: $test_id, start_date: Date("Y-m-d H:i:s"), db: $db); 
	//$t->insert();
	$t->generate_questions(4);
	$questions = $t->get_questions();
?>
	<div id=<?=$test_id?>> 
		<?php foreach ($questions as $q){ ?>

			<div class="question"> 
				<span><?=$q->get_question()?> </span>
				<br>

				<?php foreach ($q->get_options() as $o){ ?>
					<label for=<?=$q->get_id()?>><?=$o?></label>
					<input type="radio" id=<?=$q->get_id()?> value=<?=$o?>>
				<?php } ?>
			</div>

		<?php } ?>
		<button name="submit" onclick=send_data()> Submit </button>
	</div>

<script> 
	function send_data(){
		/*var radios = document.querySelectorAll("input[type='radio']");
		var data1 = {};
		for (let i = 0; i < radios.length; i++){
			data1[radios[i].id] = radios[i].value;
		}*/

	}
</script>
