<?php require_once ("connection.php") ?>
<?php require_once ("functions.php"); ?>

<?php

$action = mysql_prep($_POST['selectedRadioValue']);
$questionareId = mysql_prep($_POST['selectedQuestionareId']);

$query_delete_questionare = "DELETE FROM  code  WHERE questionare_id = '{$questionareId}'"; 

$query_delete_answers = "DELETE FROM  answers  WHERE questionare_id = '{$questionareId}'";
$query_delete_questions = "DELETE FROM  questions  WHERE questionare_id = '{$questionareId}'";

if ($action === '0') {
    $answers_for_this_questionare = "select * from answers where questionare_id={$questionareId}";
    if (mysql_num_rows(mysql_query($answers_for_this_questionare)) > 0) {

        mysql_query($query_delete_questionare, $connection); 
    } else {

        mysql_query($query_delete_questionare, $connection);
        mysql_query($query_delete_questions);
        
    }
} else if ($action === '1') {

    $result = mysql_query($query_delete_answers, $connection);
} else {

    mysql_query($query_delete_questionare, $connection);
    mysql_query($query_delete_answers, $connection);
    mysql_query($query_delete_questions, $connection);
}
