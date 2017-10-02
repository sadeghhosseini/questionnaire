<?php require_once ("connection.php") ?>
<?php require_once ("functions.php"); ?>

<?php

$questionId = mysql_prep($_POST['questionId']);
$questionareId = mysql_prep($_POST['questionareId']);
$codeDevelopment = mysql_prep($_POST['codeDevelopment']);
$codeProduction = mysql_prep($_POST['codeProduction']);



$code_exist_query = "select * "
        . "from questions where "
        . " questionare_id = '{$questionareId}' and "
        . "question_id_in_code='{$questionId}'";

if (mysql_fetch_array(mysql_query($code_exist_query, $connection)) != FALSE) {
    $query = "DELETE "
            . "FROM questions "
            . "WHERE "
            . "questionare_id='{$questionareId}' and "
            . "question_id_in_code='{$questionId}'";
    $result = mysql_query($query, $connection);
} else {
    $result = '1';
}



if ($result) { 
} else {
    echo "<p>" . mysql_error() . "</p>";
}
?>



<?php
$code_exist_query = "select * "
        . "from code "
        . "where "
        . "questionare_id = {$questionareId}";


if (mysql_fetch_array(mysql_query($code_exist_query, $connection)) != FALSE) { 
    $query = "UPDATE code SET "
            . "questionare_id='{$questionareId}',"
            . "code_development='{$codeDevelopment}',"
            . "code_production='{$codeProduction}' "
            . "WHERE questionare_id='{$questionareId}'";
    $result = mysql_query($query, $connection);
} else {
}

if ($result) { 
} else {
    echo "<p>" . mysql_error() . "</p>";
}
?>

<?php mysql_close($connection); ?>