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
                <form>
                    @csrf
                    <div class="form-group">
                        <select class="form-control" id="priority_id" name="priority_id">
                            <option value="">Set Priority</option>
                            @foreach($priorities as $priority)
                            <option value="{{ $priority->id }}">{{ $priority->priority}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">If Any Funding Required :</label>
                        <input type="text" class="form-control" id="fund" name="fund" placeholder="Enter Amount">
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    <button type="button" class="btn btn-primary">Submit</button>
                </form>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>