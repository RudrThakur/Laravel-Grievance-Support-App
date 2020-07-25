@extends('user.partials.master')

@section('title', 'Tickets')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tickets</h1>
        <p class="mb-4">These are the tickets that were raised by you</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <div class="btn-group float-right">
                    <a href="#" data-toggle="modal"
                       data-target="#ticket-search-modal"><h6
                            class="m-2 font-weight-bold text-primary">Search | </h6></a>
                    <a href="#" data-toggle="modal"
                       data-target="#ticket-filter-modal"><h6
                            class="m-2 font-weight-bold text-primary">Filters | </h6></a>
                    <a href="/tickets"><h6
                            class="m-2 font-weight-bold text-primary">Clear Filters</h6></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Raised By</th>
                            <th>Type</th>
                            <th>Current Holder</th>
                            <th>Status</th>
                            <th>Raised On</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Raised By</th>
                            <th>Type</th>
                            <th>Current Holder</th>
                            <th>Status</th>
                            <th>Raised On</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($tickets as $ticket)
                            <tr>
                                <td>{{ $ticket->id }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->type->type }}</td>
                                <td>{{ $ticket->authority->name }}</td>
                                <td>{{ $ticket->status->status }}</td>
                                <td>{{ $ticket->created_at }}</td>
                                <td><a href="javascript:void(0)" id="{{ $ticket->id }}"
                                       class="service-show btn btn-outline-primary btn-sm"><i
                                            class="fas fa-eye"></i></a>
                                    <a href="javascript:void(0)" id="{{ $ticket->id }}"
                                       class="service-action btn btn-outline-primary btn-sm"><i
                                            class="fas fa-tasks"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $tickets->links() }}
                    </div>
                </div>

            </div>
        </div>

        @include('user.partials.modals.ticket-filter-modal')

        @include('user.partials.modals.ticket-search-modal')

        @include('user.partials.modals.service-details-modal')

        @include('user.partials.modals.service-action-modal')

    </div>
    <!-- /.container-fluid -->

@endsection
