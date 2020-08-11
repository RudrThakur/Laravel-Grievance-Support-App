<!-- Account Delete Modal-->
<div class="modal fade" id="account-delete-modal" tabindex="-1" role="dialog" aria-labelledby="account-delete-modal"
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
                Select "Delete" below if you are sure about deleting your Account.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form method="POST" id="account-delete-form"
                action="/account-delete/{{ auth()->user()->id }}">
                    @csrf
                   <button type="submit"
                       class="btn btn-outline-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>
