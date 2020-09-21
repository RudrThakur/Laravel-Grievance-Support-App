@extends('user.partials.master')

@section('title','Edit Profile')

@section('content')
@include('sweetalert::alert')

  <div class="col-10 d-block bg-light mx-auto">
            <div class="card p-lg-4 p-2">
                <h2 class="text-center">Edit Your Profile</h2>
                <div class="row">
                    <div class="col-md-6 col-12 my-auto">
                       <img src="{{ asset('images/edit_profile.svg') }}" class="img-fluid" />
                    </div>
                    <div class="col-md-6 col-12 mx-auto">
                        @include('user.partials.forms.edit-profile-form')
                     </div>
                </div>
            </div>
        </div>

@endsection
