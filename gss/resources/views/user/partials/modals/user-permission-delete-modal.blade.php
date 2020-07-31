<!-- Permission Delete Modal-->
<div class="modal fade" id="permission-delete-modal" tabindex="-1" role="dialog"
     aria-labelledby="permission-delete-modal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">You Sure About This Action?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-alert alert alert-danger service-action-alerts" id="user-permission-delete-errors-box">
                    <ul id="user-permission-delete-errors"></ul>
                </div>
                <div class="custom-alert alert alert-success service-action-alerts" id="user-permission-delete-success-box">
                    <p>User Permission Deleted Successfully</p>
                </div>
                Select "Delete" below if you are ready to delete this permission.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button id="permission-delete-btn" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>
