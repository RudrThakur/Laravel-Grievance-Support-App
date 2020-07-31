@extends('user.partials.master')

@section('title','Manage Users')

@section('content')

    <div class="card">
        @include('user.partials.errors');
        <div class="card-body row justify-content-center">
            <div class="col-md-12 col-12">
                <h6 class="text-center">Manage Users</h6>
                <hr>
                <table class="table table-bordered" id="manage-roles-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Permissions</th>
                        <th>Status</th>
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
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach($user->permissions as $userPermission)
                                    {{ $userPermission->id }})
                                    {{ $userPermission->name}}
                                    <a href="#" class="user-permission-delete"
                                       data-user-id="{{ $user->id }}"
                                       data-permission-id="{{ $userPermission->id }}">
                                        <i class="fas fa-times-circle" style="color: brown;"></i>
                                    </a>
                                    <br>
                                @endforeach
                                <a href="#"><i class="fas fa-edit" style="color: teal;"></i></a>
                            </td>
                            <td>No Data Available<br> <a href="#"><i class="fas fa-edit"
                                                                     style="color: teal;"></i></a></td>
                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="javascript:void(0)" id="{{ $user->id }}"
                                   class="service-action btn btn-outline-primary btn-sm"><i
                                        class="fas fa-tasks"></i></a>
                                <a href="javascript:void(0)" id="{{ $user->id }}"
                                   class="service-delete btn btn-outline-danger btn-sm"><i
                                        class="fas fa-trash"></i></a>
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

        @include('user.partials.modals.user-permission-delete-modal');
    </div>

@endsection
