<?php require_once ("connection.php"); ?>
<?php require_once ("functions.php"); ?>

<?php require_once './site_root.php'; ?>
<?php require_once './include/header.php'; ?>

<?php

function saveAnswer($questionare_id, $questionId, $answer, $respondent_id) {
    $questionare_id_safe = mysql_prep($questionare_id);
    $questionId_safe = mysql_prep($questionId);
    $answer_safe = mysql_prep($answer);
    $respondent_id_safe = mysql_prep($respondent_id);
    global $connection;
    $query = "insert into "
            . "answers "
            . "("
            . "questionare_id, "
            . "question_id, "
            . "answer, "
            . "respondent_id"
            . ") "
            . "values("
            . "'{$questionare_id_safe}', "
            . "'{$questionId_safe}', "
            . "'{$answer_safe}', "
            . "'{$respondent_id_safe}'"
            . ")";

    $result = mysql_query($query, $connection);

    if ($result) {
        
    } else {
        echo "<p>" . mysql_error() . "</p>";
    }
}
?>
<?php
echo '<br />';
if ($_POST) {
    $data = $_POST;
    $questionare_id = mysql_prep($_GET['form']);
    $respondent_id = time();
    foreach ($data as $key => $value) {
        $question_id = $key;
        $answer = $value;
        if (is_array($value)) {

            $chbox = "";
            foreach ($value as $ques => $ans) { 
                $chbox .= $ans . ',';
            }
            $chbox = rtrim($chbox, ',');
            saveAnswer($questionare_id, $key, $chbox, $respondent_id);
        } else {

            saveAnswer($questionare_id, $key, $value, $respondent_id);
        }
    }
} else {
    
}

if ($_GET) {

    $form_id = mysql_prep($_GET['form']);

    $result = get_form_by_id($form_id);
    if ($result) {



        $code_development = $result['code_development'];
        $code_production = $result['code_production'];
        ?>
        <form method = "post" >

        <?php echo $code_production; ?>

            <input type = "submit" />
        </form>

        <?php
    } else {
        echo 'چنین صفحه‌ای وجود ندارد.';
    }
} else {
    echo 'آدرس صفحه اشتباه است.';
}
?>


<script>
    jq16('.date-picker').datepicker();



</script>
<?php require_once './include/footer.php'; ?>