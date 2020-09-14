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
    <div class="card col-12 mx-auto border-0 shadow">
      <h3 class=" text-center font-weight-bolder border-bottom mb-3 p-3 text-primary">REQUEST-FORM FOR HALL
          UTILIZATION</h3>
      <div class="card-body">
        @include('user.partials.errors')
          <form id="hallbookings-form">
              @csrf
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                          <label for="department" class="font-weight-bold">Select Department:</label>
                          <select class="form-control" id="department" name="department" required disabled>
                              {{-- <option value="{{ $department->id}}" selected>{{ $department->departmentname}}</option> --}}
                          </select>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                          <label for="date" class="font-weight-bold">Date</label>
                          <input type="date" class="form-control" name="bookingdate" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                          <label for="timefrom" class="font-weight-bold">Time-From</label>
                          <input type="time" class="form-control datetimepicker-input" id="timepicker" name="timefrom" placeholder="select time" required >
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                          <label for="timeto" class="font-weight-bold">Time-To</label>
                          <input type="time" class="form-control" id="timeto" name="timeto"
                              placeholder="Enter on which date you need" required>  
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                          <label for="Event" class="font-weight-bold">Event-Name</label>
                          <input type="textarea" class="form-control" id="eventname" name="eventname"
                              placeholder="not more than 150 character" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                      <div class="form-group">
                          <label for="time" class="font-weight-bold">Speakers-Names</label>
                          <input type="textarea" class="form-control" id="speakers" name="speakers"
                              placeholder="not more than 150 character" required>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label for="participant" class="font-weight-bold">No.of Participants</label>
                          <input type="number" min="1" max="5000" class="form-control" id="participants"
                              name="participants" placeholder="Enter total no." required>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group" class="font-weight-bold">
                          <label for="Chief-Guests">No.of Chief-Guests</label>
                          <input type="number" min="1" max="5000" class="form-control" id="chiefguests"
                              name="chiefguests" placeholder="Enter total no." required>
                      </div>
                  </div>
              </div>
              <div class="form-group my-3">
                  <h4 class="text-center  text-info text-uppercase" style="letter-spacing: 20px;">Halls
                      Required</h4>
                  <hr>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom1" 
                          value="Mirza Seminar Theatre(AC)"name="requiredhalls">
                          <label class="custom-control-label font-weight-bold" for="custom1">Mirza Seminar
                              Theatre(AC)</label>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom2"
                          value="Seminar Hall-S13(Non-AC)" name="requiredhalls">
                          <label class="custom-control-label font-weight-bold " for="custom2">Seminar
                              Hall-S13(Non-AC)</label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom3" name="requiredhalls" 
                          value="KMC Auditorium(AC)">
                          <label class="custom-control-label font-weight-bold " for="custom3">KMC Auditorium(AC)</label>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom4" 
                          value="Digital Library(AC)" name="requiredhalls">
                          <label class="custom-control-label font-weight-bold" for="custom4">Digital Library(AC)</label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom5" 
                          value="Mother Theresa Block(Non-AC)" name="requiredhalls">
                          <label class="custom-control-label font-weight-bold " for="custom5">Mother Theresa
                              Block(Non-AC)</label>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom6" 
                          value="Seminar Hall-F14(AC)" name="requiredhalls">
                          <label class="custom-control-label font-weight-bold " for="custom6">Seminar Hall-F14(AC)</label>
                      </div>
                  </div>
              </div>
              <div class="form-group border-bottom my-3">
                  <h4 class="text-center text-info text-uppercase" style="letter-spacing: 10px;">Other
                      Facilities Required</h4>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom7" 
                          value="Audio" name="requiredfacilities">
                          <label class="custom-control-label font-weight-bold" for="custom7">Audio</label>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom8" 
                          value="Podium" name="requiredfacilities">
                          <label class="custom-control-label font-weight-bold " for="custom8">Podium</label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom9" 
                          value="Cordless Mic" name="requiredfacilities">
                          <label class="custom-control-label  font-weight-bold" for="custom9">Cordless Mic</label>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="custom-control custom-checkbox mb-4">
                          <input type="checkbox" class="custom-control-input" id="custom10" 
                          value="LCD Projector" name="requiredfacilities">
                          <label class="custom-control-label  font-weight-bold" for="custom10">LCD Projector</label>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label for="chairs" class="font-weight-bold">No. of Chairs:</label>
                          <input type="number" min="1" max="5000" class="form-control" id="chairs"
                              name="chairs" placeholder="Enter total no." required>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                      <div class="form-group">
                          <label for="VIP-Chairs" class="font-weight-bold">No. of VIP-Chairs:</label>
                          <input type="number" min="1" max="5000" class="form-control" id="vipchairs"
                              name="vipchairs" placeholder="Enter total no." required>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <label for="Event" class="font-weight-bold">Others:</label>
                  <input type="textarea" class="form-control" id="others" name="others"
                      placeholder="please specify not more than 150 character">
              </div>
              <div class="form-group">
                  <label for="name" class="font-weight-bold">Requistion Submitted by:</label>
                  <input type="text" class="form-control" id="username" name="username"
              placeholder="Enter your name" value="{{ session()->get('username')}}" disabled required>
              </div>
              <div class="row">
                <div class="col-md-4 col-10 mx-auto">
                  <button class="btn btn-primary btn-block" type="submit" name="submit">Submit</button>
                </div>
              </div>
          </form>
      </div>
  </div>
  </div>
</div>
<!-- /.container-fluid -->

@endsection