<form id="edit-profile-form" method="POST" action="/edit-profile">
    @csrf
    <div class="form-group">
        <label for="user-phone" class="col-form-label">Phone</label>
        <input type="text" class="form-control" id="user-phone" name="user_phone" placeholder="Enter Phone"
        value="{{ $profile ? $profile->phone : '' }}">
    </div>
    <div class="form-group">
        <label for="user-department" class="col-form-label">Department</label>
        <input type="text" class="form-control" id="user-department" name="user_department"
               placeholder="Enter Department"
        value="{{ $profile ? $profile->department : '' }}">
    </div>
    <div class="form-group">
        <label for="user-address" class="col-form-label">Address</label>
        <input type="text" class="form-control" id="user-address" name="user_address" placeholder="Enter Address"
        value="{{ $profile ? $profile->address : '' }}">
    </div>
    <div class="form-group">
        <label for="user-dob" class="col-form-label">Date of Birth</label>
        <input type="date" class="form-control" id="user-dob" name="user_dob" placeholder="Enter DOB"
        value="{{ $profile ? $profile->dob : '' }}">
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-warning">Update</button>
    </div>
</form>
