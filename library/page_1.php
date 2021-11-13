<form action="" method="post"> 
	<input name="input_1" type="text"> 
	<button name="submit"> Submit </button>
</form>
<?php
	if (isset($_POST["submit"])) {
		echo "submit";
	}
?>	

