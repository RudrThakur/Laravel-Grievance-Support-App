@extends('user.partials.master')

@section('title','Service Details')

@section('content')
    @include('user.partials.errors')
    <div class="card">
        <div class="card-body row">
            <div class="col-lg-5 col-xl-5 col-md-12 col-12">
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
                            @if($serviceAction)
                                <h6 class="text-center">Prior Service Action</h6>
                                <table id="adminaction-table" class="table data-table">
                                    <tbody>
                                    <tr>
                                        <th>Current Holder</th>
                                        <td>{{ $ticket->authority->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Priority</th>
                                        <td>{{ $service->priority->priority }}</td>
                                    </tr>
                                    <tr>
                                        <th>Worker Assigned</th>
                                        <td>{{ $serviceAction->worker ? $serviceAction->worker->name : 'No Data Available'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fund Amount</th>
                                        <td>{{ $serviceAction->fund ? $serviceAction->fund : 'No Data Available'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Approvals Required</th>
                                        @if($serviceActionAuthorities)
                                            <td>
                                                @foreach($serviceActionAuthorities as $serviceActionAuthority)
                                                    {{ $authorities->where('id', $serviceActionAuthority->authority_id)->first()->name }}
                                                    @if($serviceActionAuthority->approved == 1)
                                                        <i class="fas fa-check-circle" style="color: green;"></i> |
                                                    @elseif(is_null($serviceActionAuthority->approved))
                                                        <i class="fas fa-exclamation-circle" style="color: black;"></i>
                                                        |
                                                    @else
                                                        <i class="fas fa-times-circle" style="color: red;"></i> |
                                                    @endif
                                                @endforeach
                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Admin Remarks</th>
                                        <td>{{ $serviceAction->adminremarks}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $ticket->status->status }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            @else
                                <h6 class="text-center">Service - Action</h6>
                                <hr>
                                @include('user.partials.forms.service-action-form')
                            @endif

                            @if($serviceAction && $serviceActionAuthorities)

                                <h6 class="text-center">Service - Approval</h6>
                                <hr>
                                @include('user.partials.forms.service-approval-form')

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
