<!-- Logout Modal-->
<div class="modal fade" id="ticket-delete-modal" tabindex="-1" role="dialog" aria-labelledby="ticket-delete-modal"
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
                <div class="custom-alert alert alert-danger service-action-alerts" id="ticket-delete-errors-box">
                    <ul id="ticket-delete-errors"></ul>
                </div>
                <div class="custom-alert alert alert-success service-action-alerts" id="ticket-delete-success-box">
                    <p>Ticket Deleted Successfully</p>
                </div>
                Select "Delete" below if you are sure about deleting this ticket.
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-outline-danger" id="ticket-delete-btn">Delete</button>
            </div>
        </div>
    </div>
</div>
