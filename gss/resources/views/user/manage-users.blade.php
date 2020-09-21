@extends('user.partials.master')

@section('title','Manage Users')

@section('content')

     <div>
        <div class="alert alert-success" role="alert" id="manage-user-status-success" style="display: none;"></div>
        <div class="alert alert-danger" role="alert" id="manage-user-status-failed" style="display: none;">
        </div>
    </div>
    <div class="card">
        <div class="card-body row justify-content-center">
            <div class="col-md-12 col-12">

                @include('user.partials.errors')

                <div class="custom-alert alert alert-danger" id="manage-users-errors-box">
                    <ul id="manage-users-errors"></ul>
                </div>
                <div class="custom-alert alert alert-success" id="manage-users-success-box">
                    <h6 id="manage-users-success"></h6>
                </div>
                <h2 class="text-center text-dark">Manage Users</h2>
                <hr>
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permissions</th>
                        <th>Current Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permissions</th>
                        <th>Current Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td id="manage-users-user-id">{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->permissions as $userPermission)
                                    {{ $userPermission->id }})
                                    {{ $userPermission->name}}
                                    <a href="#" class="user-permission-delete-btn"
                                       data-user-id="{{ $user->id }}"
                                       data-permission-id="{{ $userPermission->id }}">
                                        <i class="fas fa-times-circle" style="color: brown;"></i>
                                    </a>
                                    <br>
                                @endforeach
                                <a href="#" class="user-permissions-edit-btn"
                                   data-user-id="{{ $user->id }}">
                                    <i class="fas fa-edit" style="color: teal;">
                                    </i>
                                </a>
                            </td>
                            <td>
                                <div class="form-group">
                                    <span >{{ $user->is_active ? 'Active' : 'Inative' }}</span>
                                        <select id='set-user-active' name='set_user_active' class="form-control">
                                          <option value="">-- Select Status --</option>
                                          <option value="1">Active</option>
                                          <option value="0">Inactive</option>
                                        </select>
                                    </div>
                            </td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="javascript:void(0)" id="{{ $user->id }}"
                                   class="user-edit btn btn-outline-primary btn-sm"><i
                                        class="fas fa-tasks"></i></a>

                                @if($user->id != auth()->user()->id)
                                    <a href="javascript:void(0)" id="{{ $user->id }}"
                                       class="user-delete btn btn-outline-danger btn-sm"><i
                                            class="fas fa-trash"></i></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-12 d-flex justify-content-center">
                    {{ $users->links() }}
                </div>
            </div>
        </div>

        @include('user.partials.modals.user-delete-modal')

        @include('user.partials.modals.user-permission-delete-modal')

        @include('user.partials.modals.user-permissions-edit-modal')

    </div>

@endsection
