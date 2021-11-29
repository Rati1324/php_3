<div class="insert">
    <label for="">First Name:</label>
    <input type="text" name="f_name">
    <br>
    <label for="">Last Name:</label>
    <input type="text" name="l_name">
    <br>
    <label for="">Date of Birth:</label>
    <input type="date" name="dob">
    <br>
    <label for="">Id:</label>
    <input type="text" name="id">
    <br>
    <label for="">Position:</label>
    <input type="text" name="position">
    <br>
    <button onclick="insert()" name="submit">Submit</button>
</div>

<script>
    function insert() {
        var inputs = document.querySelectorAll(".insert > input");
        var data = []
        for (let i = 0; i < inputs.length; i++) {
            data.push(inputs[i].value)
        }

        fetch("ajax_insert.php", {
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
