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
                     <tr>
                        <th>Worker Assigned</th>
                        <td>{{ $serviceAction->worker_id ? $serviceAction->worker->name : 'No Data Available'}}</td>
                    </tr>
                    <tr>
                        <th>Admin Remarks</th>
                        <td>{{ $serviceAction->adminremarks }}</td>
                    </tr>
                    <tr>
                        <th>Fund Allocated</th>
                        <td>{{ $serviceAction->fund }}</td>
                    </tr>
                     <tr>
                        <th>Created At</th>
                        <td>{{ $serviceAction->created_at->toFormattedDateString() }}</td>
                    </tr>
                     <tr>
                        <th>Last Updated</th>
                        <td>{{ $serviceAction->updated_at->diffForHumans() }}</td>
                    </tr>
                    </tbody>
                </table>
            <h6 class="text-center">Service - Details</h6>
            <table id="advanced_table" class="table data-table">
                <tbody>
                   <tr>
                        <th>Department</th>
                        <td>{{ $service->department }}</td>
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
                            {{ $service->created_at->toFormattedDateString() }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $service->updated_at->diffForHumans() }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-xl-7 col-lg-7 col-md-12 col-12 d-block bg-light p-4">
            <div class="card">
                <div class="card-body row">
                    <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                        <h6 class="text-center">Service Approval</h6>
                        <table id="service-approval-table" class="table data-table">
                            <tbody>

                            @include('user.partials.forms.service-approval-form')

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
