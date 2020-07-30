<form method="POST" action="/create-permission">
    @csrf
    <div class="form-group">
        <lable for="role-name">Enter Permission</lable>
        <input type="text" class="form-control" name="permission_name" id="permission-name"
               aria-describedby="role-name" placeholder="Enter Permission Name" required>
    </div>
    <hr>
    <button class="btn btn-primary" type="submit">Create</button>
</form>

