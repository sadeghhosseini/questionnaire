<?php require_once ("connection.php") ?>
<?php require_once ("functions.php"); ?>

<?php

$questionId = mysql_prep($_POST['questionId']);
$questionareId = mysql_prep($_POST['questionareId']);
$questionTitle = mysql_prep($_POST['questionTitle']);


$code_exist_query = "select * "
        . "from questions where "
        . " questionare_id = '{$questionareId}' and "
        . "question_id_in_code='{$questionId}'";

if (mysql_fetch_array(mysql_query($code_exist_query, $connection)) != FALSE) {
    $query = "UPDATE questions SET"
            . " question_title='{$questionTitle}',"
            . "questionare_id='{$questionareId}',"
            . "question_id_in_code='{$questionId}' "
            . "WHERE "
            . "questionare_id='{$questionareId}' and "
            . "question_id_in_code='{$questionId}'";
} else {
    $query = "insert into questions (questionare_id, question_id_in_code, question_title) "
            . "values('{$questionareId}', '{$questionId}', '{$questionTitle}')";
}

$result = mysql_query($query, $connection);

if ($result) { 
} else {
    echo "<p>" . mysql_error() . "</p>";
}
?>

<?php mysql_close($connection); ?>