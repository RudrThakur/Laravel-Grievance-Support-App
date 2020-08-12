<!-- User Delete Modal-->
<div class="modal fade" id="user-delete-modal" tabindex="-1" role="dialog" aria-labelledby="user-delete-modal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are You Sure?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Select "Delete" below if you are sure about Deleting User
                #<span id="user-id-delete"></span>.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form id="user-delete-form">
                    <button type="submit"
                            class="btn btn-outline-danger">Delete
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
