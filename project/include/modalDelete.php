<button id="modal-link-of-questionare-button"style="display: none;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></button>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">حذف </h4>
            </div>
            <div class="modal-body">
                <p id="modal-link-of-questionare" ></p>
                <p id="">
                <div class="radio"><label><input type="radio" name="actiontype" value="0" class="modal-radio-button" checked/>فقط پرسشنامه پاک شود</label></div>
                <div class="radio"><label><input type="radio" name="actiontype" value="1" class="modal-radio-button"/>فقط پاسخ ها پاک شود</label></div>
                <div class="radio"><label><input type="radio" name="actiontype" value="2" class="modal-radio-button"/>هم پرسشنامه و هم پاسخ های مربط به آن پاک شود</label></div>
                </p>
            </div>
            <div class="modal-footer">
                <input type="button" value="پاک" id="modal-delete-button" class="btn btn-danger" data-dismiss="modal"/>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script>
    $('#myModal').css('display', 'none');
    $('#modal-delete-button').click(function() {
        
        modalDeleteButtonAction();
        updateUpdatePanel();

    });
</script>