@extends('user.partials.master')

@section('title', 'Service')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Services</h1>
  <p class="mb-4">Fill the form below to make a Service Request.
  </p>

  <!-- The Modal for raising the ticket-->
  <div id="service-form-box">
    <div id="messages"></div>
    <div class="card">
      <div class="card-body">

        @include('user.partials.errors')

        <form method="POST" action="/service-request">
          @csrf
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Choose a category</label>
                <select class="form-control" id="category" name="category" required>
                  <option value="">Select Service Category</option>
                  @foreach($categories as $category)
                  <option value="{{ $category }}">{{ $category }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Choose a subcategory</label>
                <select class="form-control" id="subcategory" name="subcategory" required>
                  <option value="">Select Service Subcategory</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Block</label>
                <select name="block" id="block" class="form-control" required>
                  <option value="">Select Block</option>
                  @foreach($blocks as $block)
                  <option value="{{ $block }}">{{ $block }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Department</label>
                <select name="department" id="department" class="form-control" required>
                  <option value="">Select Department</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Floor</label>
                <select name="floor" id="floor" class="form-control" required>
                  <option value="">Select Floor</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Room Number</label>
                <select name="room" id="room" class="form-control" required>
                  <option value="">Select Room</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Asset-code</label>
                <input type="text" class="form-control" name="assetcode" id="assetcode" placeholder="Enter Asset Code">
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Quantity</label>
                <input type="number" name="quantity" class="form-control" id="quantity" min="1" max="500" step="1"
                  placeholder="Enter Quantity" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Description</label>
                <textarea col="2" name="description" maxlength="200" class="form-control" id="description"
                  placeholder="Enter Description (Less than 150 Characters)" required></textarea>
              </div>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="jumbotron small1 form-group text-center">
                <label class="text-primary">Select Priority</label>
                <select class="form-control" id="priority_id" name="priority_id" required>
                  <option value="">Select Priority</option>
                  @foreach($priorities as $priority)
                  <option value="{{ $priority->id }}">{{ $priority->priority }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <div align="center" id="submit-btn-box">
            <button class="btn btn-primary" type="submit" name="submit">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection