<?php

$query = "select * "
        . "from code ";


$result = mysql_query($query, $connection);

if ($result) {
    
} else {

    echo "<p>" . mysql_error() . "</p>";
}
?>
<?php

if (mysql_num_rows($result)) {
    echo '<lable >';
    echo '<select id="forms-combo-box">';


    while ($row = mysql_fetch_assoc($result)) {

        echo '<option class="select-opt" value="'
        . $row['questionare_id']
        . '" data-combo-box-question-description="'
        . $row['questionare_desc']
        . '">';
        echo $row['questionare_name'] . '-' . date('m/d/Y H:i:s', $row['questionare_id'] );
        echo '</option>';
    }


    echo '</select>';
    echo '</lable>';
    echo '<a href="" id="edit-questionare-button"  class="btn btn-primary" target="_blank">اصلاح</a>';

    echo '<input type="button" id="delete-questionare-button"  class="btn btn-danger" value="حذف" />';

    echo '' .
    '<div class="container">
            <div class="alert alert-info">
                <!--<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>-->
                <strong id="qustionare-description-alert">Descript!</strong> 
                <div id="link-to-form" ></div>
                <div>';
    echo '<a href="" id="show-answers-button" target="_blank">پاسخ مربوط به این سوال</a>';
    echo'</div>
                <div  >زمان ساخته شدن: <span id="created-date"></span></div>
            </div>
        </div>';
}
?>