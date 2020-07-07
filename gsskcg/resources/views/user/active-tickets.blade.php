@extends('user.partials.master')

@section('title', 'My Active Tickets')

@section('styles')

<style>

</style>

@endsection

@section('scripts')

<script type="text/javascript">
  $(function(){
   
    $('.show').on('click', function () {
      var ticketId = $(this).attr('id');
    
         $.ajax({
          url : "/service-details/" + ticketId,
          type: "get",
          dataType: "json",
          success:function(data)
          {
         
            $('.modal-title').text('Service Details');
            $('#service-details-modal').modal('show'); 
            $('#service-ticketId').html(data.ticket.id);
            $('#service-category').html(data.service.category);
            $('#service-user-name').html(data.ticket.user.name);
            $('#service-department').html(data.service.department);
            $('#service-subcategory').html(data.service.subcategory);
            $('#service-holder').html(data.ticket.holder);
            $('#service-block').html(data.service.block);
            $('#service-floor').html(data.service.floor);
            $('#service-room').html(data.service.room);
            $('#service-quantity').html(data.service.quantity);
            $('#service-assetcode').html(data.service.assetcode);
            $('#service-created_at').html(data.ticket.created_at);
            $('#service-updated_at').html(data.ticket.updated_at);
            $('#service-status').html(data.ticket.status);
            $('#service-userId').html(data.ticket.user.id);
            $('#service-description').html(data.service.description);    
    
          },error:function(error){ 
           console.log(error);
          }
         });
      });
});

</script>
@endsection

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800">Active Tickets</h1>
  <p class="mb-4">These are the tickets that were raised by you and are still active</a>.</p>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Active Tickets Info</h6>
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
              <th>Worker Assigned</th>
              <th>Priority</th>
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
              <th>Worker Assigned</th>
              <th>Priority</th>
              <th>Created At</th>
              <th>Updated At</th>
              <th>Action</th>
            </tr>
          </tfoot>
          <tbody>

            @foreach($tickets as $ticket)
            <tr>
              <td>{{ $ticket->id }}</td>
              <td>{{ $ticket->type }}</td>
              <td>{{ $ticket->holder }}</td>
              <td>{{ $ticket->status }}</td>
              <td>{{ $ticket->worker }}</td>
              <td>{{ $ticket->priority }}</td>
              <td>{{ $ticket->created_at }}</td>
              <td>{{ $ticket->updated_at }}</td>
              <td><a href="#" name="show" id="{{ $ticket->id }}" class="show btn btn-outline-primary btn-sm"><i
                    class="fas fa-eye"></i></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @include('user.partials.modals.service-details')

</div>
<!-- /.container-fluid -->

@endsection