<div class="modal fade" id="service-action-modal" tabindex="-1" role="dialog" aria-labelledby="service-action-modal"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="service-action-modal-label">Service Action</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-alert alert alert-danger service-action-alerts" id="service-action-errors-box">
                    <ul id="service-action-errors"></ul>
                </div>
                <div class="custom-alert alert alert-success service-action-alerts" id="service-action-success-box">
                    <p>Service Action Was Successful</p>
                </div>

                @include('user.partials.forms.service-action-form')

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
