<?php
function display_word($in_english, $in_georgian, $id) { ?>
    <form action="" method="post" autocomplete="off">    
        <input type="text" name="in_english" value=<?=$in_english?>>
        <input type="text" name="in_georgian" value=<?=$in_georgian?>>
        <input type="hidden" name="id" value=<?=$id?>>
        <button name="update">Update</button>
		<button name="remove">Delete</button>
    </form>
<?php } 

function display_insert(){ ?>
	<?php } ?>
