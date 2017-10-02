<?php



function mysql_prep($value) {

    $magic_quotes_active = get_magic_quotes_gpc();  
    $new_enough_php = function_exists("mysql_real_escape_string");   

    if ($new_enough_php) {
        if ($magic_quotes_active) {
            $value = stripcslashes($value);   
        }
        $value = mysql_real_escape_string($value); 
    } else {
        if (!$magic_quotes_active) {
            $value = addslashes($value);
        }

    }
    return $value;
}


function confirm_query($result_set) {
    if (!$result_set) {
        die("Database query failed" . mysql_error());
    }
}

function get_all_subjects($public = TRUE) {
    global $connection;

    $query = " SELECT * 
		FROM subjects ";
    if ($public) {
        $query .= " WHERE visible = '1'";
        
    }
    $query .= "ORDER BY position ASC ";


    $subject_set = mysql_query($query, $connection);
    confirm_query($subject_set);

    return $subject_set;
}



function get_form_by_id($questionare_id) {
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM code ";
    $query .= "WHERE questionare_id = " . $questionare_id . " ";
    $result_set = mysql_query($query, $connection);
    confirm_query($result_set);
    if ($result = mysql_fetch_array($result_set)) {
        return $result;
    } else {
        return null;
    }
}








