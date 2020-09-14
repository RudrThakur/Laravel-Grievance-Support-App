@extends('user.partials.master')

@section('title','Account Settings')

@section('content')

    <div class="col-8 d-block bg-light p-4 mx-auto">
        <div class="card">
            <div class="card-body row">
                <div class="col-12">
                    <h2 class="text-center my-3">Account Settings</h2>
                    <div class="row">
                        <div class="col-md-6 col-12 my-auto">
                            <img src="{{ asset('images/delete_account.svg') }}" class="img-fluid" />
                        </div>
                        <div class="col-md-6 col-12 mx-auto">
                            <div class="text-center my-5">
                                <h6 class="m-2">Delete Account</h6>
                                <a class="btn btn-danger" href="javascript:void(0)"
                                    data-toggle="modal" data-target="#account-delete-modal">
                                        Delete
                                 </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('user.partials.modals.account-delete-modal')

    </div>

@endsection
