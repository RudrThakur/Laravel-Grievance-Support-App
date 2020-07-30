<form method="POST" action="/create-role">
    @csrf
    <div class="form-group">
        <lable for="role-name">Enter Role</lable>
        <input type="text" class="form-control" name="role_name" id="role-name"
               aria-describedby="role-name" placeholder="Enter Role Name">
    </div>
    <h6>Permissions</h6>
    @foreach($permissions as $permission)
        <div class="form-check-inline m-2">
            <label class="form-check-label" for="{{ $permission->slug }}">
                <input type="checkbox" class="form-check-input" id="{{ $permission->slug }}" name="role_permissions[]"
                       value="{{ $permission->id }}">{{ $permission->name }}
            </label>
        </div>
    @endforeach
    <hr>
    <button class="btn btn-primary" type="submit">Create</button>
</form>

