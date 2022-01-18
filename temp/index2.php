<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            echo "inserting stuff";
            $servername = "localhost";
            $dbname = "temp";
            $user = "rati";
            $password = "123456";
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $user, $password);
            
            $f_name = $_POST['f_name'];
            $l_name = $_POST['l_name'];
            $number = $_POST['number'];
            $query = "INSERT INTO person (f_name, l_name, p_number) VALUES(:f_name, :l_name, :p_number)";
            $stmt = $conn->prepare($query);
            $stmt->execute([
                'f_name' => $f_name,
                'l_name' => $l_name,
                'p_number' => $number,
            ]);
        }
    ?>

    <!-- <form action="" autocomplete="off"> -->
        <input type="text" name="f_name" id="f_name"><br>
        <input type="text" name="l_name" id="l_name"><br>
        <input type="text" name="number" id="p_number"><br>
        <button name="submit" onclick="insert()">Submit</button>
    <!-- </form> -->
<script>
    function insert() {
        var f_name = document.querySelector("#f_name").value
        var l_name = document.querySelector("#l_name").value
        var p_number = document.querySelector("#p_number").value
        
        var data = {f_name: f_name, l_name: l_name, p_number}
        fetch('handle_ajax.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data),
        })
        .then(res => res.text())
        .then(data => {
            console.log(data)
        })
    }
    
</script> 
</body>
</html>