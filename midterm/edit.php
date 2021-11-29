<?php
    require('db.php');
    $db = new db();
    // if (isset($_POST))
    $users = $db->select();
?>

<div class="edit">
    <label for="search">Search</label>
    <input type="text">
    <label for="">By</label>
    <select name="search_by">
        <option value="f_name">First Name</option>
        <option value="l_name">Last Name</option>
    </select>
    <button name="search">Search</button>
    <br>
    <br>
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
            <input type="text" name="personal_id" value=<?=$u["personal_id"]?>>
            <br>
            <label for="">Position:</label>
            <input type="text" name="position" value=<?=$u["position"]?>>
            <br>
            <button onclick="update(this.id)" id=<?=$u["id"]?> name="submit">Submit</button>
        </div>
    <?php } ?>

</div>

<script>
    function update(id) {
        var inputs = document.getElementById(id)
        var data = {'id' : id};
        console.log(data)
        
        for (let i = 0; i < inputs.children.length; i++) {
            if (inputs.children[i].tagName == "INPUT") {
                data[inputs.children[i].name] = inputs.children[i].value;
            }
        }
        fetch("ajax_update.php", {
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

    function seach() {
        
    }
</script>