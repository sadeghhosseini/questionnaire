<script>
    function addEditPanelDivContainerBeginning(questionId) {
        var beginning = '<div data-container-question-id="' + questionId + '" data-container-question-title="t" class="well">' +
                '<span data-remove-question-id="' + questionId + '" class="remove-x">✘</span>' +
                '<input type="text" class="question-field" data-question-id="' + questionId + '" placeholder="سوال خود را بنویسید"/>';
        return beginning;
    }

    function addMainDivContainerBeginning(questionId) {
        var beginning = '<div data-container-question-id="' + questionId + '" data-container-question-title="t" >' +
                '<label data-question-id="' + questionId + '" for="' + questionId + '">Default:</label>';

        return beginning;
    }

    function addEditPanelDivContainerEnd() {
        var end = '</div>';
        return end;
    }

    function addMainDivContainerEnd() {
        var end = '</div>';

        return end;
    }

    function radioButtonChildEditPanel(questionId, checkboxId, first) {
        var child = '<div class="radio" data-check-box-div-label-id="' + checkboxId + '">';
        child += '<input type="radio" name="' + questionId + '" value="default" data-check-box-id="' + checkboxId + '" checked>';
        child += '<input type="text" class="check-box-label" data-check-box-label-id="' + checkboxId + '" placeholder="گزینه"/>';
        if (first === false) {
            child += '<span data-remove-check-radio-child="' + checkboxId + '" class="remove-check-radio-child-x">✘</span>';
        }
        child += '</div>';
        return child;
    }

    function checkboxChildEditPanel(questionId, checkboxId, first) {
        var child = '<div class="checkbox" data-check-box-div-label-id="' + checkboxId + '">';
        child += '<input type="checkbox" name="' + questionId + '[]" value="added" data-check-box-id="' + checkboxId + '"/>' +
                '<input type="text" class="check-box-label" data-check-box-label-id="' + checkboxId + '" placeholder="گزینه"/>';
        if (first === false) {
            child += '<span data-remove-check-radio-child="' + checkboxId + '" class="remove-check-radio-child-x">✘</span>';
        }

        child += '</div>';
        return child;
    }

    function dropDownChildEditPanel(questionId, ddChildId, first) {
        var child = '';
        child += '<div data-drop-down-div-label-id="' + ddChildId + '">';
        child += '<input type="text" name="' + questionId + '" data-drop-down-child-label-id ="' + ddChildId + '" class="drop-down-child-label" placeholder="آیتم لیست"/>';
        if (first === false) {
            child += '<span data-remove-drop-down-child="' + ddChildId + '" class="remove-drop-down-child-x">✘</span>';
        }
        child += '</div>';
        return child;
    }

    function radioButtonChildMain(questionId, checkboxId) {
        var radioChildId = 'que' + questionId + 'che' + checkboxId;

        var child = '<div class="radio" data-check-box-div-label-id="' + checkboxId + '">';
        child += '<input type="radio" name="' + questionId + '" value="default" data-check-box-id="' + checkboxId + '" id="' + radioChildId + '">' +
                '<label data-check-box-label-id="' + checkboxId + '" for="' + radioChildId + '">Default</label> ';
        child += '<div>';

        return child;
    }

    function checkboxChildMain(questionId, checkboxId) {
        var checkboxChildId = 'que' + questionId + 'che' + checkboxId;

        var child = '<div class="checkbox" data-check-box-div-label-id="' + checkboxId + '">';
        child += '<input type="checkbox" name="' + questionId + '[]" value="default" data-check-box-id="' + checkboxId + '" id="' + checkboxChildId + '">' +
                '<label data-check-box-label-id="' + checkboxId + '" for="' + checkboxChildId + '">Default</label>';
        child += '</div>';

        return child;
    }

    function dropDownChildMain(ddChildId) {
        var child = '<option data-drop-down-child-label-id="' + ddChildId + '" >گزینه</option>';
        return child;
    }


    function addTextField() {
        ++questionId;

        var elementCode = '' +
                addEditPanelDivContainerBeginning(questionId) +
                addEditPanelDivContainerEnd();

        var resultCode = '';
        resultCode += addMainDivContainerBeginning(questionId) +
                '<input type="text" name="' + questionId + '" class="form-control" id="' + questionId + '"/> <br />'
        addMainDivContainerEnd();

        $('#edit-panel').append(elementCode);
        $('#main').append(resultCode);
    }

    function addRadioButton() {
        ++questionId;
        ++checkboxId;
        var elementCode = addEditPanelDivContainerBeginning(questionId) +
                '<br/>' +
                radioButtonChildEditPanel(questionId, checkboxId, true) +
                '<input type="button" value="add" id="add-radio-child-element" data-group-name="' + questionId + '" data-last-check-box-label-id="' + checkboxId + '" /> <br />'
        addEditPanelDivContainerEnd();

        var resultCode = addMainDivContainerBeginning(questionId) + '<input type="hidden" name="' + questionId + '" />' + radioButtonChildMain(questionId, checkboxId) + addMainDivContainerEnd();

        $('#edit-panel').append(elementCode);
        $('#main').append(resultCode);
    }

    function addCheckBox() {
        ++questionId;
        ++checkboxId;
        var elementCode = addEditPanelDivContainerBeginning(questionId) +
                '<br/>' +
                checkboxChildEditPanel(questionId, checkboxId, true) +
                '<input type="button" value="add" id="add-check-child-element" data-group-name="' + questionId + '" data-last-check-box-label-id="' + checkboxId + '" /> <br />'
        addEditPanelDivContainerEnd();

        var resultCode = addMainDivContainerBeginning(questionId) + '<input type="hidden" name="' + questionId + '" />' +
                checkboxChildMain(questionId, checkboxId) +
                addMainDivContainerEnd();
        $('#edit-panel').append(elementCode);
        $('#main').append(resultCode);
    }

    function addDropDown() {
        ++questionId;
        ++ddChildId;
        var elementCode = addEditPanelDivContainerBeginning(questionId);
        elementCode += '<br />';
        elementCode += dropDownChildEditPanel(questionId, ddChildId, true);
        elementCode += '<input type="button" value="add" id="add-drop-down-child-element" data-group-name="' + questionId + '" data-last-drop-down-child-label-id="' + ddChildId + '" /> <br />';
        elementCode += addEditPanelDivContainerEnd();


        var resultCode = addMainDivContainerBeginning(questionId) +
                '<select name="' + questionId + '">' +
                dropDownChildMain(ddChildId) +
                '</select>' +
                addMainDivContainerEnd();
        $('#edit-panel').append(elementCode);
        $('#main').append(resultCode);
    }

    function addDatePicker() {
        ++questionId;
        var elementCode = addEditPanelDivContainerBeginning(questionId);
        elementCode += '<br />';
        addEditPanelDivContainerEnd();

        var resultCode = '';
        resultCode += addMainDivContainerBeginning(questionId) +
                '<input type="text" name="' + questionId + '" class="form-control date-picker" /> <br />'
        addMainDivContainerEnd();

        $('#edit-panel').append(elementCode);
        $('#main').append(resultCode);
    }

    function addRadioButtonChild(sourceElement) {
        ++checkboxId;
        var nameOfThisGroup = sourceElement.attr('data-group-name');
        var dataLastCheckboxLabelId = $("[data-container-question-id = '" + nameOfThisGroup + "']").find('input:radio:last').attr('data-check-box-id');

        var sourceElementForLabel = $("#main [data-check-box-div-label-id='" + dataLastCheckboxLabelId + "']");

        sourceElement.attr('data-last-check-box-label-id', checkboxId);

        var elementCode = radioButtonChildEditPanel(nameOfThisGroup, checkboxId, false);


        var resultCode = radioButtonChildMain(nameOfThisGroup, checkboxId);
        $(elementCode).insertBefore(sourceElement);
        $(resultCode).insertAfter(sourceElementForLabel);


    }

    function addCheckBoxChild(sourceElement) {
        ++checkboxId;

        var nameOfThisGroup = sourceElement.attr('data-group-name');

        var dataLastCheckboxLabelId = $("[data-container-question-id = '" + nameOfThisGroup + "']").find('input:checkbox:last').attr('data-check-box-id');

        var sourceElementForLabel = $("#main [data-check-box-div-label-id='" + dataLastCheckboxLabelId + "']");

        sourceElement.attr('data-last-check-box-label-id', checkboxId);
        var elementCode = checkboxChildEditPanel(nameOfThisGroup, checkboxId, false);

        var resultCode = checkboxChildMain(nameOfThisGroup, checkboxId);


        $(elementCode).insertBefore(sourceElement);
        $(resultCode).insertAfter(sourceElementForLabel);



    }

    function addDropDownChild(sourceElement) {
        ++ddChildId;
        var nameOfThisGroup = sourceElement.attr('data-group-name');
        var dataLastDrowpDownChildLabelId = $("#edit-panel [data-container-question-id = '" + nameOfThisGroup + "']").find('input:text:last').attr('data-drop-down-child-label-id');
        var sourceElementForLabel = $("#main [data-drop-down-child-label-id='" + dataLastDrowpDownChildLabelId + "']");
        var elementCode = dropDownChildEditPanel(nameOfThisGroup, ddChildId, false);
        var resultCode = dropDownChildMain(ddChildId);

        $(elementCode).insertBefore(sourceElement);
        $(resultCode).insertAfter(sourceElementForLabel);
    }




    function saveToDb(url, data) {
        $.post(url, data, function(response, status) {
            saveToDbCallback(response, status);
        });
    }

    function saveToDbCallback(response, status) {

    }

    function postToDb(url, data, callback) {
        $.post(url, data, callback);
    }

    function getRequestToDb(url, data, callback) {
        $.get(url, data, callback);
    }

    function onKeyupQuestionFieldsEditPanel(theElement) {
        theElement.parent().attr('data-container-question-title', theElement.val());
        theElement.attr('value', theElement.val());

        $("#main [data-question-id ='" + theElement.attr('data-question-id') + "']").html(theElement.val());
    }

    function onKeyupCheckBoxLabelTextFieldInEditPanel(theElement) {
        checkboxLabelId = theElement.attr('data-check-box-label-id');
        $("#edit-panel[data-check-box-id ='" + checkboxLabelId + "']").val(theElement.val());
        $("#main [data-check-box-id ='" + checkboxLabelId + "']").val(theElement.val());
        $("#main [data-check-box-label-id ='" + checkboxLabelId + "']").html(theElement.val());
        theElement.attr('value', theElement.val());
    }

    function onKeyupDropDownLabelTextFieldInEditPanel(theElement) {
        var dropDownChildId = theElement.attr('data-drop-down-child-label-id');
        $("#main [data-drop-down-child-label-id='" + dropDownChildId + "']").html(theElement.val());
        $("#main [data-drop-down-child-label-id='" + dropDownChildId + "']").val(theElement.val());
        theElement.attr('value', theElement.val());
    }

    function doneButton() {
        $('.date-picker').removeClass('hasDatepicker');
        $('.question-field').each(function() {
            var questionTitle = $(this).val();
            var questionId = $(this).attr('data-question-id');


            var data = {
                questionId: questionId,
                questionareId: questionareId,
                questionTitle: questionTitle,
            };
            var url = 'saveQuestions.php';


            saveToDb(url, data);



        });
        var code = {
            questionareId: questionareId,
            codeDevelopment: $('#edit-panel').html(),
            codeProduction: $('#main').html(),
            authorName: $('#author-name').val(),
            questionareName: $('#questionare-name').val(),
            questionareDesc: $('#questionare-desc').val()

        };

        var url = "saveCode.php";
        var callback = function(response, status) {
            showModalLink();
        }
        postToDb(url, code, callback);
    }

    function getBaseUrl() {
        var re = new RegExp(/^.*\//);
        return re.exec(window.location.href);
    }

    function showModalLink() {
        $('#modal-link-of-questionare').html(getBaseUrl() + 'form.php?form=' + questionareId);
        $('#modal-link-of-questionare-button').click();
    }

    function showModalDeleteOptions() {
        $('#modal-link-of-questionare-button').click();
    }

    function modalDeleteButtonAction() {
        var selectedRadioValue = $('.modal-radio-button:checked').val();
        var selectedQuestionareId = $('#forms-combo-box').find(':selected').val();

        var callback = function(response, status) {

            $(".select-opt[value='" + selectedQuestionareId + "']").remove();
            showSelectedQuestionDescription();

        }
        var url = "delete.php";


        var data = {
            'selectedRadioValue': selectedRadioValue,
            'selectedQuestionareId': selectedQuestionareId
        };


        postToDb(url, data, callback);
    }

    function timestampToDate(timestamp) {
        var timestamp = parseInt(timestamp);
        var date = new Date(timestamp * 1000);
        return date.toLocaleString();
    }
	
	function getTimeFromServerSide() {
        url = "date_from_server.php";
        data = {};
        callback = function(response, status) {
            questionareId = response;
            $('#questionare-id').attr('data-questionare-id', questionareId);
        }
        postToDb(url, data, callback);
    }
</script>