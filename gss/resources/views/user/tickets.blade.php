@extends('user.partials.master')

@section('title', 'Tickets')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Tickets</h1>
  <p class="mb-4">These are the tickets that were raised by you</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Tickets Info</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Ticket Id</th>
              <th>Type</th>
              <th>Current Holder</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Ticket Id</th>
              <th>Type</th>
              <th>Current Holder</th>
              <th>Status</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($tickets as $ticket)
            <tr>
              <td>{{ $ticket->id }}</td>
              <td>{{ $ticket->type->type }}</td>
              <td>{{ $ticket->authority->name }}</td>
              <td>{{ $ticket->status->status }}</td>
              <td>{{ $ticket->created_at }}</td>
              <td>{{ $ticket->updated_at }}</td>
              <td><a href="javascript:void(0)" id="{{ $ticket->id }}"
                  class="service-show btn btn-outline-primary btn-sm"><i class="fas fa-eye"></i></a>
                <a href="javascript:void(0)" id="{{ $ticket->id }}"
                  class="service-action btn btn-outline-primary btn-sm"><i class="fas fa-tasks"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('user.partials.modals.service-details-modal')

  @include('user.partials.modals.service-action-modal')

</div>
<!-- /.container-fluid -->

@endsection