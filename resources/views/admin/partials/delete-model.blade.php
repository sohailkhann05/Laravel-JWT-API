<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog"> 
        <div class="modal-content"> 
            <div class="modal-header"> 
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                <h4 class="modal-title">Confirm Delete</h4> 
            </div> 
            <div class="modal-body"> 
                <p>Are you sure to delete?</p>
            </div> 
            <div class="modal-footer"> 
                <button type="button" class="btn btn-inverse waves-effect" data-dismiss="modal">Close</button>
                <form action="" id="delete-form" method="POST" style="display: inline-block;">
                    @csrf
                    <input type="hidden" id="delete_id" name="id">
                    <button type="submit" class="btn btn-default waves-effect waves-light">Cofirm Delete</button> 
                </form>
            </div> 
        </div> 
    </div>
</div>