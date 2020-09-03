@extends('user.partials.master')

@section('title','Ticket Details')

@section('content')
    <div class="custom-alert alert alert-danger service-action-alerts" id="service-action-errors-box">
        <ul id="service-action-errors"></ul>
    </div>
    <div class="custom-alert alert alert-success service-action-alerts" id="service-action-success-box">
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
                        <td id="ticket-id">{{ $ticket->id }}</td>
                    </tr>
                    <tr>
                        <th>Ticket Type</th>
                        <td>{{ $ticket->type->type }}</td>
                    </tr>
                    <tr>
                        <th>Current Holder</th>
                        <td>{{ $ticket->authority->name }}</td>
                    </tr>
                    <tr>
                        <th>Raised By</th>
                        <td>{{ $ticket->user->name }}</td>
                    </tr>
                    <tr>
                        <th>User Id</th>
                        <td>{{ $ticket->user_id }}</td>
                    </tr>
                    <tr>
                        <th>Registered At</th>
                        <td>{{ $ticket->created_at->toFormattedDateString() }}</td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>{{ $ticket->updated_at->diffForHumans() }}</td>
                    </tr>
                    </tbody>
                </table>
                @if($ticket->type->type == 'Service')
                    <a class="m-2 btn btn-success" href="/service-details/{{ $service->id }}">View Service Details</a>
                @endif
                <button class="service-delete m-2 btn btn-danger">Delete Ticket</button>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-12 col-12 d-block bg-light p-4">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                            <h6 class="text-center">Track Your Ticket</h6>
                            <table id="track-ticket-table" class="table data-table">
                                <tbody>
                                <tr>
                                    <th>Ticket Raised</th>
                                    <td>{{ $ticket->created_at->toFormattedDateString() }}</td>
                                </tr>
                                <tr>
                                    <th>Admin Responded</th>
                                    <td>{{ $serviceAction ? $serviceAction->created_at->toFormattedDateString() : 'No Data Available'}}</td>
                                </tr>
                                <tr>
                                    <th>Work Started</th>
                                    <td>No Data Available</td>
                                </tr>
                                <tr>
                                    <th>Work Completed</th>
                                    <td>No Data Available</td>
                                </tr>
                                <tr>
                                    <th>Ticket Closed</th>
                                    <td>No Data Available</td>
                                </tr>
                                <tr>
                                    <th>Feedback Recorded</th>
                                    <td>No Data Available</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            @include('user.partials.modals.ticket-delete-modal')
        </div>
    </div>

@endsection
