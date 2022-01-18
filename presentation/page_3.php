<?php
    session_start();
?>
<style>
    *{
        font-size:40px;
    }
</style>

<h2>Welcome to Page 3!</h2>
<div>First name: <?=$_SESSION['username']?></div>
<a href="page_2.php">Page 2</a> <br>
<form action="index.php" method="post">
    <button name="logout">Log out</button>
</form>