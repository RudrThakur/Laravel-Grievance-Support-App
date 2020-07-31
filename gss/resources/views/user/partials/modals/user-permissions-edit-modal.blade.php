<div class="modal fade" id="user-permissions-edit-modal" tabindex="-1" role="dialog"
     aria-labelledby="user-permissions-edit-modal"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="user-permission-edit-modal-label">Edit User Permissions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-alert alert alert-danger"
                     id="user-permissions-edit-errors-box">
                    <ul id="user-permissions-edit-errors"></ul>
                </div>
                <div class="custom-alert alert alert-success"
                     id="user-permissions-edit-success-box">
                    <p>User Permissions Were Successfully Updated</p>
                </div>
                <form id="user-permissions-edit-form">
                    @csrf
                    <h6 class="mt-4">Set User Permissions</h6>
                    @foreach($allPermissions as $permission)
                        <div class="form-check-inline m-2">
                            <label class="form-check-label" for="{{ $permission->slug }}">
                                <input type="checkbox" class="form-check-input" id="{{ $permission->slug }}"
                                       name="user_permissions[]"
                                       value="{{ $permission->id }}">{{ $permission->name }}
                            </label>
                        </div>
                    @endforeach
                    <hr>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Modify</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
