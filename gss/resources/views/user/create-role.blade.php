@extends('user.partials.master')

@section('title','Create Role')

@section('content')

    <div class="card">
        @include('user.partials.errors');
        <div class="card-body row justify-content-center">
            <div class="col-lg-5 col-xl-5 col-md-12 col-12">
                <h6 class="text-center">Create Role</h6>
                <hr>
                @include('user.partials.forms.create-role-form')
            </div>
        </div>
    </div>

@endsection
