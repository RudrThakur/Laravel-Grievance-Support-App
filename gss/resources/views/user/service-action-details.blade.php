@extends('user.partials.master')

@section('title','Service Action Details')

@section('content')
<div class="alert alert-danger service-action-alerts" id="service-action-errors-box">
    <ul id="service-action-errors"></ul>
</div>
<div class="alert alert-success service-action-alerts" id="service-action-success-box">
    <p>Service Action Was Successful</p>
</div>
<div class="card">
    <div class="card-body row">
        <div class="col-lg-5 col-xl-5 col-md-12 col-12">
             <h6 class="text-center">Service Action - Details</h6>
                 <table id="advanced_table" class="table data-table">
                    <tbody>
                    <tr>
                        <th>Service Action ID</th>
                        <td>{{ $serviceAction->id }}</td>
                    </tr>

                    </tbody>
                </table>
            <h6 class="text-center">Service - Details</h6>
            <table id="advanced_table" class="table data-table">
                <tbody>
                    <tr>
                        <th>Department</th>
{{--                        <td>{{ $service->department }}</td>--}}
                    </tr>


                </tbody>
            </table>
        </div>

        <div class="col-xl-7 col-lg-7 col-md-12 col-12 d-block bg-light p-4">
            <div class="card">
                <div class="card-body row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                        <h6 class="text-center">Prior Service Action</h6>
                        <table id="adminaction-table" class="table data-table">
                            <tbody>
{{--                                <tr>--}}
{{--                                    <th>Current Holder</th>--}}
{{--                                    <td>{{ $ticket->authority->name }}</td>--}}
{{--                                </tr>--}}

                            </tbody>
                        </table>
                        <h6 class="text-center">Service - Action</h6>
                        <hr>
{{--                        @include('user.partials.forms.service-action-form')--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
