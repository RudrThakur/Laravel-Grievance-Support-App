@extends('user.partials.master')

@section('title', 'Capital Equipment')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Capital Equipments</h1>
  <p class="mb-4">Fill the form below to make a Capital Equipment Request.
  </p>

  <!-- The Modal for raising the ticket-->
  <div id="capital-equipment-form-box">
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