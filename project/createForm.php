<?php require_once './site_root.php'; ?>
<?php require_once './include/header.php'; ?>


<?php require_once './include/add_panel.php'; ?>

<div id="edit-panel">
    <input type="hidden" id="questionare-id" />
    <p>
    <div class="row"> 
        <div class="col-xs-6">
            <label for="questionare-name">نام پرسشنامه: </label>
        </div>
        <div class="col-xs-6">
            <input type="text" id="questionare-name" class="questionare-information-text-fields"/> 
        </div>
    </div>
    <div class="row"> 
        <div class="col-xs-6">
            <label for="questionare-desc">توضیحات: </label>
        </div>
        <div class="col-xs-6">
            <input type="text" id="questionare-desc" class="questionare-information-text-fields"/> 
        </div>
    </div>
    <div class="row"> 
        <div class="col-xs-6">
            <label for="author-name">سازنده: </label>
        </div>
        <div class="col-xs-6">
            <input type="text" id="author-name" class="questionare-information-text-fields"/>  
        </div>
    </div>


</p>
</div>

<hr />


<div id="main" class="main-container">
</div>


<br />
<input type="button" value="✔ایجاد پرسشنامه✔" id="done" class="btn btn-success btn-block"/>


<?php require_once './include/modal.php'; ?>


<script>

    var name = 0;
    var questionId = 0;
    var questionareId = $.now() / 1000;

    var checkboxId = 0;
    var ddChildId = 0;


    $('#questionare-id').attr('data-questionare-id', questionareId);
              
                
</script>

<?php require_once './include/jsfunctions.php'; ?>

<?php require_once 'include/js.php'; ?>

<script>
	getTimeFromServerSide();
</script>


</body>

</html>