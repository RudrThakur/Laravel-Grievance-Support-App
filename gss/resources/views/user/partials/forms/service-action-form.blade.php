<form id="service-action-form" method="POST" action="/service-action/{{ $service->id }}">
    @csrf
    <div class="form-group">
        <label for="recipient-name" class="col-form-label">If Any Funding Required</label>
        <input type="text" class="form-control funding_field" id="fund" name="fund" placeholder="Enter Amount">
    </div>
    <label for="recipient-name" class="col-form-label">Approval(s) Required</label>
    <br>
    <div class="form-check-inline my-3">
        @foreach($authorities as $authority)
            @if($authority->slug != 'admin')
                <label class="form-check-label" for="{{ $authority->slug }}">
                    <input type="checkbox" class="form-check-input m-2 funding_field" id="{{ $authority->slug }}" name="authorities[]"
                           value="{{ $authority->id }}">{{ $authority->name }}
                </label>
            @endif
        @endforeach
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Message:</label>
        <textarea class="form-control funding_field" id="admin-remarks" name="adminremarks" rows="4" cols="20"></textarea>
    </div>
    <div class="form-group">
        <div class="form-check">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input" value="deny_funding" name="deny_funding_check"
                id="deny_funding_check">No Funding
                Required
            </label>
        </div>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>
