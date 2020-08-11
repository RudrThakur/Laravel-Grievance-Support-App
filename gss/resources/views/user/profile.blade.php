@extends('user.partials.master')

@section('title','Profile')

@section('content')
    <div class="card">
        <div class="card-body mx-auto">
            <div class="col-12">
                <h6 class="text-center">Your Profile</h6>
                <table class="table data-table">
                    <tbody>
                    <tr>
                        <th>User-ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                     <tr>
                        <th>Name</th>
                        <td>{{ $user->name }}</td>
                    </tr>
                     <tr>
                        <th>Email Address</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                     <tr>
                        <th>Phone</th>
                        <td>{{ $profile->phone }}</td>
                    </tr>
                       <tr>
                        <th>Department</th>
                        <td>{{ $profile->department }}</td>
                    </tr>
                       <tr>
                        <th>Date of Birth</th>
                        <td>{{ $profile->dob }}</td>
                    </tr>
                       <tr>
                        <th>Account Created On</th>
                        <td>{{ $user->created_at->toFormattedDateString() }}</td>
                    </tr>
                       <tr>
                        <th>Last Updated</th>
                        <td>{{ $profile->updated_at->diffForHumans() }}</td>
                    </tr>
                    </tbody>
                </table>

                <a class="btn btn-primary" href="/edit-profile">Edit Profile</a>

            </div>
        </div>
    </div>

@endsection
