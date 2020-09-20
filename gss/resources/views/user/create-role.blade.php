@extends('user.partials.master')

@section('title','Create Role')

@section('content')
   @include('sweetalert::alert')
   <div class="row">
       <div class="col-11 mx-auto">
            <div class="card shadow border-0 p-4">
                <h2 class="text-center font-weight-bold my-3">Create Role</h2>
                <div class="row">
                    <div class="col-md-6 col-12 my-auto">
                        <img src="{{ asset('images/addrole.svg') }}" class="img-fluid" />
                    </div>
                    <div class="col-md-6 col-12 mx-auto my-2">
                        @include('user.partials.forms.create-role-form')     
                    </div>
                </div>
            </div>
       </div>
   </div>
    {{-- <div class="card shadow border-0 p-4">
        @include('user.partials.errors');
        <div class="card-body row justify-content-center">
            <div class="col-lg-5 col-xl-5 col-md-12 col-12">
                <h6 class="text-center">Create Role</h6>
                <hr>
                @include('user.partials.forms.create-role-form')
            </div>
        </div>
    </div> --}}

@endsection
