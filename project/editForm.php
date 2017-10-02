<?php require_once ("connection.php"); ?>
<?php require_once ("functions.php"); ?>

<?php require_once './site_root.php'; ?>
<?php require_once './include/header.php'; ?>


<?php

if ($_GET) {

    $form_id = mysql_prep($_GET['form']);

    $result = get_form_by_id($form_id);
    if ($result) {



        $code_development = $result['code_development'];
        $code_production = $result['code_production'];
        ?>

        <?php require_once './include/add_panel.php'; ?>


        <div id="edit-panel">
            <?php echo $code_development; ?>
        </div>
        <hr />
        <div id="main">

            <?php echo $code_production; ?>
        </div>
        <?php echo '<input type="button" value="✔اصلاح پرسشنامه✔" id="done" class="btn btn-success btn-block"/>'; ?>
        <?php
    } else {
        echo 'چنین صفحه‌ای وجود ندارد.';
    }
} else {
    echo 'آدرس صفحه اشتباه است.';
}
?>


<br />

    <?php require_once './include/modal.php'; ?>


<script>

    var name = 0;
    var questionId = 0;
    var questionareId = $.now() / 1000;
    var checkboxId = 0;
    var ddChildId = 0;



    populatescriptVariables();
    function populatescriptVariables() {
        questionareId = $("[data-questionare-id]").last().attr('data-questionare-id');
        questionId = $("[data-question-id]").last().attr('data-question-id');
        checkboxId = $("[data-check-box-label-id]").last().attr('data-check-box-label-id');
        ddChildId = $("[data-drop-down-child-label-id]").last().attr('data-drop-down-child-label-id');


        if (isNaN(checkboxId)) {

            checkboxId = 0;
        }
        if (isNaN(questionId)) {
            questionId = 0;
        }
        if (isNaN(checkboxId)) {
            checkboxId = 0;
        }
        
        if (isNaN(ddChildId)) {
            ddChildId = 0;
        }
        
        
    }
</script>
<?php require_once './include/jsfunctions.php'; ?>
<?php require_once 'include/js.php'; ?>   


</body>
</html>