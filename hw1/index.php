<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
        include('classes.php');
        include('db.php');
        include('functions.php');
        $db = new Database("localhost", "rati", "123456");

        $w = new Word("book", "wigni");
        if (isset($_POST['insert'])){
            $in_georgian = $_POST['in_georgian'];
            $in_english = $_POST['in_english'];
            $sql = "INSERT INTO word VALUES(NULL, '$in_english', '$in_georgian')";
            $db->execute($sql);
        }

        if (isset($_POST['save'])){
            $in_georgian = $_POST['in_georgian'];
            $in_english = $_POST['in_english'];
            $id = $_POST['id'];
            $sql = "UPDATE word SET in_english = '$in_english', in_georgian = '$in_georgian' WHERE id = $id";
            $db->execute($sql);
        }

        if (isset($_GET['select'])){
            $words = $db->select("SELECT in_english, in_georgian from word");
            foreach ($words as $word){
                display_word($word['in_english'], $word['in_georgian'], $word['id']);
            }
            echo "<a href='?'>Insert a new word</a>";
        }

        else { ?>
            <form action="" method="post">    
                <input type="text" name="in_english">
                <input type="text" name="in_georgian">
                <button name="insert">Insert</button>
            </form>
            <a href="?select=" name="select">View all words</a>
        <?php } ?>
    
    
</body>
</html>