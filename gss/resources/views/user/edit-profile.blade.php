@extends('user.partials.master')

@section('title','Edit Profile')

@section('content')

  <div class="col-6 d-block bg-light p-4 mx-auto">
            <div class="card">
                <div class="card-body row">
                    <div class="col-12">
                        <h6 class="text-center">Edit Your Profile</h6>
                        <hr>
                        <table class="table data-table">
                            <tbody>

                            @include('user.partials.forms.edit-profile-form')

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

@endsection
