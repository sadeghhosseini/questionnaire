<?php

require("constants.php");

$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);



mysql_set_charset("utf8");



if (!$connection) {
    die("Database connection failed: " . mysql_error());
}

$db_select = mysql_select_db(DB_NAME, $connection);
if (!$db_select) {
    die("Database connection failed" . mysql_error());
}
?>