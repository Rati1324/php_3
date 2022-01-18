<?php
    session_start();
    if (isset($_POST['logout'])) {
        unset($_SESSION['username']);
        session_destroy();
    }
?>
<form method='post' action='page_2.php'>
    <label for="username">Username</label>
    <input type="text" id="username" name="username"><br><br>

    <label for="password">Password</label>
    <input type="password" id="password" name="password"><br><br>
    <button name="login">Log In</button>
</form>