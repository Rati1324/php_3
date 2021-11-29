<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    session_start();
    $_SESSION['test'] = "fuck";
    // session_unset();
    // session_destroy();
    require("db.php");
    $db = new db();
    $questions = $db->select(table: "tests");   
    $random_q = [];
    while (count($random_q) != 3) {
        $index = rand(0, count($questions) - 1);
        if (!in_array($questions[$index], $random_q)) {
            $random_q[] = $questions[$index];
        }
    }
?>
<body>
    <div class="question_container">
    <?php foreach ($random_q as $q) { ?>
            <div class="question" id=<?=$q['id']?>>
                <div> <?=$q['question']?> </div>

                <input name=<?=$q['id']?> type="radio" value=1>
                <label for=""><?=htmlspecialchars($q['option_1'])?></label>

                <input name=<?=$q['id']?> type="radio" value=2>
                <label for=""><?=htmlspecialchars($q['option_2'])?></label>
                
                <input name=<?=$q['id']?> type="radio" value=3>
                <label for=""><?=htmlspecialchars($q['option_3'])?></label>
            </div>
    <?php } ?>
    </div>
    <button onclick="send_test()" id="submit" name="submit">Submit</button>
    <button id="again" style="display:none">Try Again</button>
    <span id="result"></span>

</body>
<script>
    function send_test() {
        var questions = document.querySelectorAll(".question > input");
        var answers = {};
        var x = [];
        var name;
        questions.forEach(q => {
            name = q.getAttribute("name");
            answers[name] = "asd";
            answers[name] = parseInt(document.querySelector('input[name=' + '"' + name + '"' + ']:checked').getAttribute("value"));
        })
        fetch("handle_ajax.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(answers),
        })
        .then(res => res.text())
        .then(data => {
            if (data == "you cant") {
                document.querySelector("#submit").disabled = true;
                document.querySelector("#result").innerHTML = "you cant";
            }
            else if (data < 3) {
                document.querySelector("#result").innerHTML = "NO";
                document.querySelector("#again").style.display = "inline";
                document.querySelector("#submit").style.display = "none";
                document.querySelector("#again").addEventListener('click', function(){ window.location.reload(true) })
            }
            else if (data == 3){
                document.querySelector("#result").innerHTML = "YES";
                window.location.href = "http://localhost/php_3/rati%20mtsituri/user_info.php";
            }
        })
    }
</script>
</html>