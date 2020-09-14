@extends('user.partials.master')

@section('title', 'Feedback')

@section('content')




<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Feedback</h1>
  <p class="mb-4">Fill the form below to give Feedback.
  </p>

  <!-- The Modal for raising the ticket-->
  <div id="feedback-form-box">
    <div id="messages"></div>
    <div class="card">
      <div class="card-body">

        @include('user.partials.errors')
        <!-- Form -->

        <form id="feedback-form" method="POST" action="/ticket-feedback">
            @csrf
            <div class="row cf mb-3">
                <p>Select Ticket ID:</p>
                <select id='ticketid' name='ticketid' class="form-control" required>
                    <option value="">-- Select Ticket --</option>
                    @foreach($tickets as $ticket)
                    <option value="{{ $ticket->id }}">ID : {{ $ticket->id }} -- Type : {{$ticket->type->type}}</option>
                    
                    @endforeach
                </select>
            </div>
            <div class="row cf">
                <div class="message">Your-Ticket:</div>
                <div id="ticket-table-box">
                    <table class="table table-bordered w-100 m-3 p-3">
                        <tr>
                            <th class ="text-primary">Ticket-ID</th>
                            <td id="ticket-ticketid"></td>
                            <th class="text-primary">Ticket-Created By</th>
                            <td id="ticket-user"></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Ticket-Created On</th>
                            <td id="ticket-ticketcreatedat"></td>
                            <th class="text-primary">Ticket-Category</th>
                            <td id="ticket-ticketcategory"></td>
                        </tr>
                        <tr>
                            <th class="text-primary">Ticket-ClosedAt</th>
                            <td id="ticket-ticketclosedat"></td>
                            <th class="text-primary">Ticket-Status</th>
                            <td id="ticket-ticketstatus"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="row cf">
                <p>Factors Unsatisfactory To You:</p>
                <div class="three col">
               <span> <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="factors[]" id="admin" value="admin", class="custom-control-input">
                    <label class="custom-control-label" for="admin"></span>
                    <span class="icon"><i class="fa fa-users-cog" aria-hidden="true"></i></span>
                    <span class="text">Admin</span></label>
                    </div>
                </div>
                <div class="three col">
                <span> <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="factors[]" id="webapp" value="webapp"  class="custom-control-input">
                    <label class="custom-control-label" for="webapp"><span
                            class="icon"><i class="fa fa-code" aria-hidden="true"></i></span><span
                            class="text">Web-App</span></label>
                            </div>
                </div>
                <div class="three col">
                <span> <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="factors[]" id="work" value="work" class="custom-control-input"><label class="custom-control-label" for="work"><span
                            class="icon"><i class="fa fa-hard-hat" aria-hidden="true"></i></span><span
                            class="text">Work</span></label></div>
                </div>
                <div class="three col">
                <span> <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="factors[]" id="management" value="management" class="custom-control-input"><label class="custom-control-label" for="management"><span
                            class="icon"><i class="fa fa-building" aria-hidden="true"></i></span><span
                            class="text">Management</span></label></div>
                </div>
            </div>
            <div class="row cf mb-3">
                <p>Enter Rating:</p>
                <select id='rating' name='rating' class="form-control" required>
                    <option value="">--Select Rating --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                </select>
            </div>
            <div class="row cf">
                <div class="message">Add a Message</div>
                <textarea class="form-control" name="message" id="message" required></textarea>
            </div>
           
                <input class="btn btn-outline-primary mt-3 text-center" type="submit" value="Submit" id="feedback-submit-btn" >
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection















