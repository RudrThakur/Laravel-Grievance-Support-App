@extends('user.partials.master')

@section('title','Permission Error')

@section('content')
    <div class="row mt-5">
        <div class="col-10 mx-auto">
            <div class="card border-0 shadow-lg p-4">
                <div class="row">
                    <div class="col-md-6 col-12 my-auto">
                        <img src="{{ asset('images/notallow.svg') }}" class="img-fluid" />
                    </div>
                    <div class="col-md-6 col-12 mx-auto my-5">
                        <h1 class="text-center"> Sorry, You Do Not Have Permission To View This Page</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
