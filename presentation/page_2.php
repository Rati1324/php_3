<?php
    session_start();
    if (isset($_POST['login'])) {
        $_SESSION['username'] = $_POST['username'];
    }
?>
<style>
    *{
        font-size:40px;
    }
</style>
<h2>Welcome to Page 2! <br> Session variables have been set.</h2>
<div>Username: <?=$_SESSION['username']?></div>
<a href="page_3.php">Page 3</a>