<?php require_once ("connection.php") ?>
<?php require_once ("functions.php"); ?>

<?php



$questionareId = mysql_prep($_POST['questionareId']);
$codeDevelopment = mysql_prep($_POST['codeDevelopment']);
$codeProduction = mysql_prep($_POST['codeProduction']);
$authorName = mysql_prep($_POST['authorName']);
$questionareName = mysql_prep($_POST['questionareName']);
$questionareDesc = mysql_prep($_POST['questionareDesc']);



$code_exist_query = "select * from code where questionare_id = {$questionareId}";

if (mysql_fetch_array(mysql_query($code_exist_query, $connection)) != FALSE) { 
    $query = "UPDATE code SET "
            . "questionare_id='{$questionareId}',"
            . "code_development='{$codeDevelopment}',"
            . "author_name='{$authorName}',"
            . "questionare_name='{$questionareName}',"
            . "questionare_desc='{$questionareDesc}',"
            . "code_production='{$codeProduction}' "
            . "WHERE questionare_id='{$questionareId}'";
} else { 
    $query = "insert into code "
            . "("
            . "questionare_id, "
            . "code_development, "
            . "code_production, "
            . "author_name, "
            . "questionare_name, "
            . "questionare_desc"
            . ") "
            . "values"
            . "("
            . "'{$questionareId}', "
            . "'{$codeDevelopment}', "
            . "'{$codeProduction}', "
            . "'{$authorName}', "
            . "'{$questionareName}', "
            . "'{$questionareDesc}'"
            . ")";
            
}
$result = mysql_query($query, $connection);

if ($result) { 
} else {
    echo "<p>" . mysql_error() . "</p>";
}
?>

<?php mysql_close($connection); ?>