@extends('admin.partials.master')

@section('title', 'Admin - Tickets')

@section('scripts')

<script type="text/javascript">
    $(function(){
   
    $('.service-show').on('click', function () {
      var ticketId = $(this).attr('id');
    
         $.ajax({
          url : "/service-details/" + ticketId,
          type: "get",
          dataType: "json",
          success:function(data)
          {
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

      $('.service-action').on('click', function () {
      var ticketId = $(this).attr('id');
        $('#service-action-modal').modal('show'); 
        //  $.ajax({
        //   url : "/service-details/" + ticketId,
        //   type: "get",
        //   dataType: "json",
        //   success:function(data)
        //   {
         
           
        //     $('#service-ticketId').html(data.ticket.id);
        //     $('#service-category').html(data.service.category);
        //     $('#service-user-name').html(data.ticket.user.name);
        //     $('#service-department').html(data.service.department);
        //     $('#service-subcategory').html(data.service.subcategory);
        //     $('#service-holder').html(data.ticket.holder);
        //     $('#service-block').html(data.service.block);
        //     $('#service-floor').html(data.service.floor);
        //     $('#service-room').html(data.service.room);
        //     $('#service-quantity').html(data.service.quantity);
        //     $('#service-assetcode').html(data.service.assetcode);
        //     $('#service-created_at').html(data.ticket.created_at);
        //     $('#service-updated_at').html(data.ticket.updated_at);
        //     $('#service-status').html(data.ticket.status);
        //     $('#service-userId').html(data.ticket.user.id);
        //     $('#service-description').html(data.service.description);    
    
        //   },error:function(error){ 
        //    console.log(error);
        //   }
        //  });
      });

});

</script>

@endsection

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
                                <th scope="col">User Id</th>
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
                                <td>{{ $ticket->user->id }}</td>
                                <td>{{ $ticket->user->name }}</td>
                                <td>{{ $ticket->status }}</td>
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