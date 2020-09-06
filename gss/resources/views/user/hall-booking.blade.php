@extends('user.partials.master')

@section('title', 'Hall Booking')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Hall Bookings</h1>
  <p class="mb-4">Fill the form below to make a Hall Booking Request.
  </p>

  <!-- The Modal for raising the ticket-->
  <div id="hall-booking-form-box">
    <div id="messages"></div>
    <div class="card">
      <div class="card-body">

        @include('user.partials.errors')

 
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection