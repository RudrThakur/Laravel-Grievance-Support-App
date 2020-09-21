<form method="POST" action="/create-permission">
    @csrf
    <div class="form-group">
        <lable for="role-name">Enter Permission</lable>
        <input type="text" class="form-control" name="permission_name" id="permission-name"
               aria-describedby="role-name" placeholder="Enter Permission Name" required>
    </div>
    <div class="row mt-5">
        <div class="col-md-4 col-12 ml-auto">
            <div class="text-center">
                <button class="btn btn-danger btn-block" type="submit">Submit</button>
            </div>
        </div>
    </div>
</form>

