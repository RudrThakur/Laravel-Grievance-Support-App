@extends('user.partials.master')

@section('title', 'Consumable')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Consumables</h1>
  <p class="mb-4">Fill the form below to make a Consumable Request.
  </p>

  <!-- The Modal for raising the ticket-->
  <div id="consumable-form-box">
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