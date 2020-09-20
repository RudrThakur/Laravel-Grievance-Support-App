<form method="POST" action="/create-user">
    @csrf
    <div class="form-group">
        <label class="mr-sm-2 col-form-label" for="user-role">Role</label>
        <select class="custom-select mr-sm-2" id="user-role" name="user_role">
            <option selected>Choose...</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="user-name" class="mr-sm-2 col-form-label">Name</label>
        <div class="mr-sm-2">
            <input type="text" class="form-control" id="user-name" placeholder="Enter Name"
                   name="user_name">
        </div>
    </div>
    <div class="form-group">
        <label for="user-email" class="mr-sm-2 col-form-label">Email</label>
        <div class="mr-sm-2">
            <input type="email" class="form-control" id="user-email" placeholder="Enter Email"
                   name="user_email">
        </div>
    </div>
    <div class="form-group">
        <label for="user-email" class="mr-sm-2 col-form-label">Password</label>
        <div class="mr-sm-2">
            <input type="password" class="form-control" id="user-password" placeholder="Enter Password"
                   name="user_password">
        </div>
    </div>
    <h6 class="mt-4">Set User Permissions</h6>
    @foreach($permissions as $permission)
        <div class="form-check-inline m-2">
            <label class="form-check-label" for="{{ $permission->slug }}">
                <input type="checkbox" class="form-check-input" id="{{ $permission->slug }}" name="user_permissions[]"
                       value="{{ $permission->id }}">{{ $permission->name }}
            </label>
        </div>
    @endforeach
    <hr>
    <div class="row mt-5">
        <div class="col-md-4 col-12 ml-auto">
            <div class="text-center">
                <button class="btn btn-primary btn-block" type="submit">Create</button>
            </div>
        </div>
    </div>
</form>

