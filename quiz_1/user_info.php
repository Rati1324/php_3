<?php
    session_start();
    if (isset($_POST['submit']) && isset($_SESSION['score'])) {
        require ('db.php');
        $db = new db();
        $data = [$_POST['name'], $_POST['id'], $_SESSION['score']];
        $db->insert($data, "person", ["name", "personal_id", "score"]);
        session_unset();
        session_destroy();
        echo "results saved";
    }

    else if (isset($_SESSION['score'])) {
?>

<form action="" method="POST">
    <input type="text" name="name"> Name 
    <input type="text" name="id"> Id
    <button name="submit">Submit</button>
</form>
<?php } ?>