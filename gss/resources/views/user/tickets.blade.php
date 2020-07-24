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
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Filters</h6>
                </div>
            <div class="card-body">
                <form method="GET" action="/tickets">
                    <h6>Ticket Type</h6>
                    <hr>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="1" name="type_id[]">
                      <label class="form-check-label" for="inlineCheckbox1">Services</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="2" name="type_id[]">
                      <label class="form-check-label" for="inlineCheckbox2">Consumables</label>
                    </div>
                    <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="3" name="type_id[]">
                      <label class="form-check-label" for="inlineCheckbox3">Capital Equipments</label>
                    </div>
                     <div class="form-check form-check-inline">
                      <input class="form-check-input" type="checkbox" id="inlineCheckbox4" value="4" name="type_id[]">
                      <label class="form-check-label" for="inlineCheckbox4">Hall Bookings</label>
                    </div>
                    <hr>
                    <button class="btn btn-success" type="submit">Apply</button>
                </form>
            </div>
        </div>
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
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $tickets->links() }}
            </div>
        </div>

    </div>
  </div>

  @include('user.partials.modals.service-details-modal')

  @include('user.partials.modals.service-action-modal')

</div>
<!-- /.container-fluid -->

@endsection
