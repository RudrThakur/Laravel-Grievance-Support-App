@extends('user.partials.master')

@section('title','Service Details')

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
            <h6 class="text-center">Ticket - Details</h6>
            <table id="advanced_table" class="table data-table">
                <tbody>
                    <tr>
                        <th>Ticket-ID</th>
                        <td>{{ $ticket->id }}</td>
                    </tr>
                    <tr>
                        <th>User Name</th>
                        <td>{{ $ticket->user->name }}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{ $service->department }}</td>
                    </tr>
                    <tr>
                        <th>User Id</th>
                        <td>{{ $ticket->user_id }}</td>
                    </tr>
                    <tr>
                        <th>Service-ID</th>
                        <td id="service-id">{{ $service->id }}</td>
                    </tr>
                    <tr>
                        <th>Service Category</th>
                        <td>
                            {{ $service->category }}</td>
                    </tr>
                    <tr>
                        <th>Service Subcategory</th>
                        <td>
                            {{ $service->subcategory }}</td>
                    </tr>
                    <tr>
                        <th>Block name</th>
                        <td>
                            {{ $service->block }}</td>
                    </tr>
                    <tr>
                        <th>Floor</th>
                        <td>
                            {{ $service->floor }}</td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td>
                            {{ $service->room }}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>
                            {{ $service->quantity }}</td>
                    <tr>
                        <th>Description</th>
                        <td>
                            {{ $service->description }}</td>
                    </tr>
                    <tr>
                        <th>Assetcode</th>
                        <td>
                            {{ $service->assetcode ? $service->assetcode : 'No Data Available'}}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $service->created_at }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $service->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-xl-7 col-lg-7 col-md-12 col-12 d-block bg-light p-4">
            <div class="card">
                <div class="card-body row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                        <table id="adminaction-table" class="table data-table">
                            <tbody>
                                <tr>
                                    <th>Current Holder</th>
                                    <td>{{ $ticket->authority->authority }}</td>
                                </tr>
                                <tr>
                                    <th>Priority</th>
                                    <td>{{ $service->priority->priority }}</td>
                                </tr>
                                <tr>
                                    <th>Worker Assigned</th>
                                    <td>{{ $ticket->worker ? $ticket->worker->name : 'No Data Available'}}</td>
                                </tr>
                                <tr>
                                    <th>Fund Amount</th>
                                    <td>{{ $service->fund ? $service->fund : 'No Data Available'}}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{{ $ticket->status->status }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <h6 class="text-center">Service - Action</h6>
                        <hr>
                        @include('user.partials.forms.service-action-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection