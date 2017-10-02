

<script>


    var codeToSubmit = null;
    $('#add-text-field').click(function() {
        addTextField();
    });




    $('#add-radio').click(function() {
        addRadioButton();
    });


    $("#add-date-picker").click(function() {
        addDatePicker();
    });
    
    $("#add-drop-down").click(function() {
        addDropDown();
    });

    $("#edit-panel").on("click", "#add-radio-child-element", function() {       
        addRadioButtonChild($(this));
    });


    $("#edit-panel").on("keyup", ".question-field", function() {
        onKeyupQuestionFieldsEditPanel($(this));
    });


    $("#edit-panel").on("keyup", ".check-box-label", function() {
        onKeyupCheckBoxLabelTextFieldInEditPanel($(this));
    });
    
    $("#edit-panel").on("keyup", ".drop-down-child-label", function() {
        onKeyupDropDownLabelTextFieldInEditPanel($(this));
    });


    $("#edit-panel").on("click", "#add-check-child-element", function() {
        addCheckBoxChild($(this));
    });
    
    $("#edit-panel").on("click", "#add-drop-down-child-element", function() {
        addDropDownChild($(this));
    });


    $('#add-check-box').click(function() {
        addCheckBox();
    });



    $('#edit-panel').on("click", ".remove-x", function() {
        var dataContainerQuestionId = $(this).attr('data-remove-question-id');
        $("#edit-panel [data-container-question-id='" + dataContainerQuestionId + "']").remove();
        $("#main [data-container-question-id='" + dataContainerQuestionId + "']").remove();

        var data = {
            questionId: dataContainerQuestionId,
            questionareId: questionareId,
            codeDevelopment: $('#edit-panel').html(),
            codeProduction: $('#main').html()
        };
        var url = "remove.php";
        var callbackFunction = function(response, status) {

        }

        postToDb(url, data, callbackFunction);

    });

    $('#edit-panel').on("click", ".remove-check-radio-child-x", function() { 
        var dataContainerQuestionId = $(this).attr('data-remove-check-radio-child');
        $("#edit-panel [data-check-box-div-label-id='" + dataContainerQuestionId + "']").remove();
        $("#main [data-check-box-div-label-id='" + dataContainerQuestionId + "']").remove();
        

        var data = {
            questionId: dataContainerQuestionId,
            questionareId: questionareId,
            codeDevelopment: $('#edit-panel').html(),
            codeProduction: $('#main').html()
        };
        var url = "remove.php";
        var callbackFunction = function(response, status) {

        }

        postToDb(url, data, callbackFunction);

    });
    
    $('#edit-panel').on("click", ".remove-drop-down-child-x", function() { 
        var dataContainerQuestionId = $(this).attr('data-remove-drop-down-child');
        $("#edit-panel [data-drop-down-div-label-id='" + dataContainerQuestionId + "']").remove();
        $("#main [data-drop-down-child-label-id='" + dataContainerQuestionId + "']").remove();
        

        var data = {
            questionId: dataContainerQuestionId,
            questionareId: questionareId,
            codeDevelopment: $('#edit-panel').html(),
            codeProduction: $('#main').html()
        };
        var url = "remove.php";
        var callbackFunction = function(response, status) {

        }

        postToDb(url, data, callbackFunction);

    });

    $('.questionare-information-text-fields').keyup(function() {
        $(this).attr('value', $(this).val());
    });

    $("#done").click(function() {
        doneButton();
    });



    $('.date-picker').livequery(function() {
        jq16(this).datepicker();
    });
    

    jq16('#dp1440971401950').datepicker();
    
    





</script>
