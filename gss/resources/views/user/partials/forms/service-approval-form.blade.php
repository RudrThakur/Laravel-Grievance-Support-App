<form id="service-approval-form">
    @csrf
    <div class="form-check">
      <input class="form-check-input" type="radio" name="approval" id="approve" value="approve" checked>
      <label class="form-check-label" for="approve">
        Approve
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="approval" id="deny" value="deny">
      <label class="form-check-label" for="deny">
        Deny
      </label>
    </div>
    <div class="form-group">
        <label for="message-text" class="col-form-label">Message:</label>
        <textarea class="form-control" id="authority-remarks" name="authority_remarks"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
