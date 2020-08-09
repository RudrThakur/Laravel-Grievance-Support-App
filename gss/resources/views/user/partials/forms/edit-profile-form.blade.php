<form id="edit-profile-form">
    @csrf
    <div class="form-group">
        <label for="user-name" class="col-form-label">Name</label>
        <input type="text" class="form-control" id="user-name" name="user_name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="user-address" class="col-form-label">Email Address</label>
        <input type="text" class="form-control" id="user-address" name="user_address" placeholder="Enter Address">
    </div>
    <div class="form-group">
        <label for="user-name" class="col-form-label">Phone</label>
        <input type="text" class="form-control" id="user-name" name="user_name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="user-name" class="col-form-label">Department</label>
        <input type="text" class="form-control" id="user-name" name="user_name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="user-name" class="col-form-label">Address</label>
        <input type="text" class="form-control" id="user-name" name="user_name" placeholder="Enter Name">
    </div>
    <div class="form-group">
        <label for="user-department" class="col-form-label">Department</label>
        <input type="text" class="form-control" id="user-department" name="user_department"
               placeholder="Enter Department">
    </div>
    <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">Update</button>
    </div>
</form>
