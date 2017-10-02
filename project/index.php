<?php require_once ("connection.php") ?>
<?php require_once ("functions.php"); ?>

<?php require_once './site_root.php'; ?>








<?php require_once './include/header.php'; ?>

<div class="container" >
    <div class="btn-group"> 
    <a href="" class="btn btn-primary" id="create-questionare-button" target="_blank" >ایجاد پرسشنامه</a> 
    <a href="" class="btn btn-primary" id="show-questionare-answers-button" target="_blank">مشاهده‌ی پاسخ‌ها </a>
    <hr />
    </div>
    <div id="update-panel"> 
        <?php require_once('./include/index_include/index_update_panel.php'); ?>
    </div>
    <br />
    <br />

    <?php require_once './include/modalDelete.php'; ?>

    <?php require_once './include/jsfunctions.php'; ?>

    <script>

        codeOnSart();
        function codeOnSart() {
            showFormLink(getComboBoxSelectedValue());
            creationTimeOfForm(getComboBoxSelectedValue());
            showSelectedQuestionDescription();

            $('#create-questionare-button').attr('href', getBaseUrl() + 'createForm.php');
            $('#show-questionare-answers-button').attr('href', getBaseUrl() + 'answers_page.php');
            $('#edit-questionare-button').attr('href', getBaseUrl() + 'editForm.php?form=' + getComboBoxSelectedValue());
            $('#show-answers-button').attr('href', getBaseUrl() + 'showAnswers.php?questionare=' + getComboBoxSelectedValue());


        }
        function showSelectedQuestionDescription() {
            $('#qustionare-description-alert').html($("#forms-combo-box option:selected").attr('data-combo-box-question-description'));
        }


        $('#update-panel').on('change', '#forms-combo-box', function() { 
            var selectedValue = getComboBoxSelectedValue();
            $('#edit-questionare-button').attr('href', getBaseUrl() + 'editForm.php?form=' + selectedValue);
            $('#show-answers-button').attr('href', getBaseUrl() + 'showAnswers.php?questionare=' + selectedValue);
            showSelectedQuestionDescription();

            showFormLink(selectedValue);


            creationTimeOfForm(selectedValue);

        });

        function creationTimeOfForm(timestamp) {
            $('#created-date').html(timestampToDate(timestamp));
        }

        $('#update-panel').on('click','#delete-questionare-button', function() { 
            showModalDeleteOptions();
        });


        $(window).focus(function(e) {
            updateUpdatePanel();

        });

        function updateUpdatePanel() {
            var url = './include/index_include/ajax_index_update_panel.php';
            var data = {};
            var callbackFunction = function(response, status) {
                $('#update-panel').html(response);
                codeOnSart();

            }
            postToDb(url, data, callbackFunction);
        }

        function showFormLink(questionareId) {
            var formLink = getBaseUrl() + 'form.php?form=' + questionareId;
            $('#link-to-form').html('<a href="' + formLink + '" target="_blank">لینک پرسشنامه</a>');
        }

        function getComboBoxSelectedValue() {
            return $("#forms-combo-box").val();
        }


    </script>
    <?php mysql_close($connection); ?>





</div>
<?php require_once './include/footer.php'; ?>