<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="?page=insert">Insert</a>
    <a href="?page=update">Update</a>
    <?php
        if (isset($_GET["page"])){
            switch($_GET["page"]) {
                case "insert":
                    include("insert.php");
                    break;
                case "update":
                    include("edit.php");
                    break;
            }
        }
    ?>
</body>
</html>