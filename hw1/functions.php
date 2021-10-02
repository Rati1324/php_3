<?php
function display_word($in_english, $in_georgian, $id) {
    ?>
    <form action="" method="post" autocomplete="off">    
        <input type="text" name="in_english" value=<?=$in_english?>>
        <input type="text" name="in_georgian" value=<?=$in_georgian?>>
        <input type="hidden" name="id" value=<?=$id?>>
        <button name="save">Save</button>
    </form>
    <?php
}
?>
