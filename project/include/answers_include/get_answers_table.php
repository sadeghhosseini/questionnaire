

<?php

if ($_GET) {
    $form_id = mysql_prep($_GET['questionare']);
    $query = "select a.*, q.question_title 
        from answers as a join questions as q on a.question_id = q.question_id_in_code 
        and a.questionare_id = q.questionare_id
        where a.questionare_id={$form_id} order by respondent_id, question_id ASC";

    $result_set = mysql_query($query, $connection);
    confirm_query($result_set);

    if (mysql_num_rows($result_set) > 0) {
        $newResult = array();
        $tableHeaders = array(); 
        $tableData = array();



        while ($row = mysql_fetch_assoc($result_set)) {
            $tableHeaders[$row['question_id']] = $row['question_title'];
        }

        $num_cols = sizeof($tableHeaders);
        $index = 0;
        $i = 0;
        mysql_data_seek($result_set, 0);
        while ($row = mysql_fetch_assoc($result_set)) {
            if ($i < $num_cols) {
                if (empty($row['answer'])) {
                    $newResult[$index][] = "-";
                    ++$i;
                } else {
                    $newResult[$index][] = $row['answer'];
                    ++$i;
                }
            } else {
                $i = 0;
                ++$index;
                if (empty($row['answer'])) {
                    $newResult[$index][] = "-";
                    ++$i;
                } else {
                    $newResult[$index][] = $row['answer'];
                    ++$i;
                }
            }
        }



        echo '<table class="table table-striped">';

        echo '<tr>';
        foreach ($tableHeaders as $th) {
            echo "<th>{$th}</th>";
        }
        echo '</tr>';

        foreach ($newResult as $qi => $rows) {
            echo '<tr>';
            foreach ($rows as $row) {
                echo "<td>{$row}</td>";
            }
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<div class="alert alert-warning fade in">اطلاعاتی جهت نمایش وجود ندارد.</div>';
    }
} else {
    echo 'آدرس صفحه اشتباه است.';
}
?>





