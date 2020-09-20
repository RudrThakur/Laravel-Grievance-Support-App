@extends('user.partials.master')

@section('title','Profile')

@section('content')
@include('sweetalert::alert')
    <div class="row">
        <div class="col-11 mx-auto">
            <div class="card">
                <div class="card-body mx-auto">
                    <div class="col-12">
                        <h2 class="text-center my-3">Your Profile</h2>
                        <div class="row">
                            <div class="col-md-6 col-12 my-auto">
                               <img src="{{ asset('images/profile.svg') }}" class="img-fluid" />
                            </div>
                            <div class="col-md-6 col-12 mx-auto">
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
                                <div class="d-flex justify-content-end">
                                    <a class="btn btn-primary" href="/edit-profile">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
