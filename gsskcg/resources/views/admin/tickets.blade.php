@extends('admin.partials.master')

@section('title', 'Admin - Tickets')

@section('content')
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tickets</h4>
                    <h6 class="card-subtitle">These are the tickets raised by the several members of your Organisation.
                        Address them wisely.</h6>
                </div>
                <div class="table-responsive-lg">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Ticket Id</th>
                                <th scope="col">Type</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Current Holder</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                            <tr>
                                <th scope="row">{{ $ticket->id }}</th>
                                <td>{{ $ticket->type->type }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->status->status }}</td>
                                <td>{{ $ticket->authority->authority }}</td>
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
            </div>
        </div>
    </div>

    @include('layouts.modals.service-details')

    @include('admin.partials.modals.service-action')

    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->

@endsection