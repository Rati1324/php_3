<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
    require("db.php");
    $db = new db();
    $questions = $db->select(table: "tests");   
    $random_q = [];

    while (count($random_q) != 7) {
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

                <input name=<?=$q['id']?> type="radio" value="<?=$q['option_1']?>">
                <label for=""><?=htmlspecialchars($q['option_1'])?></label>

                <input name=<?=$q['id']?> type="radio" value="<?=$q['option_1']?>">
                <label for=""><?=htmlspecialchars($q['option_2'])?></label>
                
                <input name=<?=$q['id']?> type="radio" value="<?=$q['option_3']?>">
                <label for=""><?=htmlspecialchars($q['option_3'])?></label>
            </div>
    <?php } ?>
    </div>
    <button onclick="send_test()" name="submit">Submit</button>

</body>
<script>
    function send_test() {
        var questions = document.querySelectorAll(".question > input");
        var answers = [];
        questions.forEach(q => {
            let name = q.getAttribute("name");
            if (!answers.includes(name)) {
                answers["'" + name + "'"] = document.querySelector('input[name=' + '"' + name + '"' + ']:checked').getAttribute("value");
            }
        })
        console.log(answers)
        fetch("handle_ajax.php", {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(answers),
        })
        .then(res => res.text())
        .then(data => {
            console.log(data)
        })
    }
</script>
</html>