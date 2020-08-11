@extends('user.partials.master')

@section('title','Account Settings')

@section('content')

    <div class="col-6 d-block bg-light p-4 mx-auto">
        <div class="card">
            <div class="card-body row">
                <div class="col-12">
                    <h6 class="text-center">Account Settings</h6>
                    <hr>
                    <table class="table data-table">
                        <tbody>
                        <div class="form-group justify-content-center d-flex m-4">
                            <h6 class="m-2">Delete Account</h6>
                            <a class="btn btn-danger" href="javascript:void(0)"
                            data-toggle="modal" data-target="#account-delete-modal">
                                Delete
                            </a>
                        </div>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('user.partials.modals.account-delete-modal')

    </div>

@endsection
