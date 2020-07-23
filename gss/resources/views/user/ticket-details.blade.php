@extends('user.partials.master')

@section('title','Ticket Details')

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
            <a class="btn btn-success" href="/service-details/0/{{ $ticket->id }}">View More</a>
            @endif
        </div>

    </div>
</div>

@endsection
