@extends('user.partials.master')

@section('title','Manage Roles')

@section('content')

    <div class="card">
        @include('user.partials.errors');
                <div class="custom-alert alert alert-success"
                     id="role-permissions-edit-success-box">
                    <p id="manage-roles-success-message"></p>
                </div>
        <div class="card-body row justify-content-center">
            <div class="col-md-12 col-12">
                <h6 class="text-center">Manage Roles</h6>
                <hr>
                <table class="table table-bordered" id="manage-roles-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Role ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Permissions</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Role ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Permissions</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->slug }}</td>
                            <td>
                                @foreach($role->permissions as $rolePermission)
                                    {{ $rolePermission->id }}){{ $rolePermission->name}}
                                    <a href="/role-permission-delete/{{ $role->id }}/{{ $rolePermission->id }}" > 
                                        <i class="fas fa-times-circle" style="color: brown;"></i>
                                    </a>
                                    <br>
                                @endforeach
                                 <a href="#" data-toggle="modal" data-target="#role-permissions-edit-modal"
                                    data-role-id="{{$role->id}}" class="role-permissions-edit-btn"
                                 ><i class="fas fa-edit" style="color: teal;"></i></a>
                            </td>
                            <td>No Data Available<br>
                             <a href="#"><i class="fas fa-edit" style="color: teal;"></i></a></td>
                            <td>{{ $role->created_at }}</td>
                            <td>{{ $role->updated_at }}</td>
                            <td>
                               
                                <a href="/role-delete/{{$role->id}}" id="{{ $role->id }}"
                                   class="service-delete btn btn-outline-danger btn-sm"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @include('user.partials.modals.role-permissions-edit-modal');
    </div>

@endsection
