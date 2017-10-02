<?php require_once ("connection.php"); ?>
<?php require_once ("functions.php"); ?>
<?php require_once './site_root.php'; ?>
<?php require_once './include/header.php'; ?>



<?php
$query = "select * "
        . "from questions  group by questionare_id"; 



$result = mysql_query($query, $connection);
?>






<div class="container" >

    <?php
    if (mysql_num_rows($result)) {
        echo '<lable >';
        echo '<select id="forms-combo-box">';

        
        while ($row = mysql_fetch_assoc($result)) {
            echo '<option class="select-opt" value="'
            . $row['questionare_id']
            . '" data-combo-box-question-description="'
            . '">';
            echo '-' . date('m/d/Y H:i:s', $row['questionare_id'] );
            echo '</option>';
        }


        echo '</select>';
        echo '</lable>';
    }
    ?>
</div>

<div>
    <input type="button" class="btn btn-primary" id="show-answers-button" value="نمایش"/>
</div>

<div id="answers-panel"></div>
<script>


    $('#show-answers-button').click(function () {
        var questionare_id = getComboBoxSelectedValue();


        var url = './include/answers_include/ajax_get_answers_table.php';
        var data = {
            'questionare': questionare_id
        };
        var callbackFunction = function(response, status) {
            $('#answers-panel').html(response);
        }
        getRequestToDb(url , data, callbackFunction);
    });
    function getComboBoxSelectedValue() {
        return $("#forms-combo-box").val();
    }
</script>
<?php require_once './include/jsfunctions.php'; ?>
<?php require_once 'include/js.php'; ?>
<?php require_once './include/footer.php'; ?>
<?php mysql_close($connection); ?>
