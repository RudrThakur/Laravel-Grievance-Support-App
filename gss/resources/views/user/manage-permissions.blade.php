@extends('user.partials.master')

@section('title','Manage Permissions')

@section('content')
@include('sweetalert::alert')

    <div class="card">
        @include('user.partials.errors');
        <div class="card-body row justify-content-center">
            <div class="col-md-12 col-12">
                <h2 class="text-center text-dark">Manage Permissions</h2>
                <hr>
                <table class="table table-bordered" id="manage-permissions-table" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Permission ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Permission ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Created On</th>
                        <th>Last Modified</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($permissions as $permission)
                        <tr>
                            <td>{{ $permission->id }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->slug }}</td>
                            <td>No Data Available<br>
                             <a href="#"><i class="fas fa-edit" style="color: teal;"></i></a></td></td>
                            <td>{{ $permission->created_at }}</td>
                            <td>{{ $permission->updated_at }}</td>
                            <td>
                                
                                <a href="/permission-delete/{{$permission->id}}" id="{{ $permission->id }}"
                                   class="service-delete btn btn-outline-danger btn-sm"><i
                                        class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
