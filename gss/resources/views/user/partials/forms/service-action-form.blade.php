<form id="service-action-form">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">If Any Funding Required</label>
        <input type="text" class="form-control" id="fund" name="fund" placeholder="Enter Amount">
    </div>
    <label for="recipient-name" class="col-form-label">Approval(s) Required</label>
    <br>
    <div class="form-check-inline my-3">
        @foreach($authorities as $authority)
        <label class="form-check-label" for="{{ $authority->slug }}">
            <input type="checkbox" class="form-check-input m-2" id="{{ $authority->slug }}" name="authorities[]"
                value="{{ $authority->id }}">{{ $authority->name }}
        </label>
        @endforeach
    </div>
    <div class="form-group">
        <label class="text-primary">Assign Worker</label>
        <select class="form-control" id="worker_id" name="worker_id">
            <option value="">Select Worker</option>
            @foreach($workers as $worker)
            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Message:</label>
        <textarea class="form-control" id="admin-remarks" name="adminremarks"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>