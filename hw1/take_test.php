<?php 
	include('test.php');	
	echo date("d-m-Y");
	$q = new Question("what is this?", [1, 2, 3, 4], 3);
	$q2 = new Question("what are these ?", [2, 5, 3, 4], 5);
	$t = new Test(questions: [$q, $q2],start_date: "d-m-Y"); 
?>

<form method='post'>
	<?php 
		
	?>
</form>
