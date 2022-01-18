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
        require('db.php');
        $db = new db();
        $users = $db->select(table: "user");
        print_r($users);
    ?>
    <div class="edit">
        <?php foreach ($users as $u) { ?>
            <div id=<?=$u['id']?>>
                <label for="">First Name:</label>
                <input type="text" name="f_name" value=<?=$u["f_name"]?>>
                <br>
                <label for="">Last Name:</label>
                <input type="text" name="l_name" value=<?=$u["l_name"]?>>
                <br>
                <label for="">Date of Birth:</label>
                <input type="date" name="dob" value=<?=$u["dob"]?>>
                <br>
                <label for="">Id:</label>
                <input type="text" name="id" value=<?=$u["personal_id"]?>>
                <br>
                <label for="">Position:</label>
                <input type="text" name="position" value=<?=$u["position"]?>>
                <br>
                <button onclick="update(this.id)" id=<?=$u["id"]?> name="submit">Submit</button>
            </div>
        <?php } ?>
    </div>
</body>
<script>
    function update(id) {
        var inputs = document.querySelector("[id='" + id + "'");
        var data = [id];
        
        for (let i = 0; i < inputs.children.length; i++) {
            if (inputs.children[i].tagName == "INPUT") {
                data.push(inputs.children[i].value);
            }
        }
        console.log(data)
        // fetch("ajax_update.php", {
        //         method: 'POST',
        //     headers: {
        //         'Content-Type': 'application/json'
        //     },
        //     body: JSON.stringify(data),
        // })
        // .then(res => res.text())
        // .then(data => {
        //     console.log(data)
        // })
    }
</script>
</html>