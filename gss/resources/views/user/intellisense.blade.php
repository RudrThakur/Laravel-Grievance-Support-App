@extends('user.partials.master')

@section('title', 'Intellisense (lets robot control your system)')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-1 text-gray-800">Intellisense</h1>
  <p class="mb-4">Turn on automate your work
  </p>
    <div class="row">
      <div class="col-md-3 col-12">
        <div class="card border-0 p-4 shadow-sm">
            <div class="d-flex justify-content-around align-content-center">
                <h6 class="sub-title">Turn on Intellisense</h6>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="intellisense-switch" />
                    <label class="custom-control-label" for="intellisense-switch"></label>
                </div>
            </div>
        </div>
      </div>
    </div>


    {{-- alerts --}}
    <div class="row fixed-bottom ml-auto" id="success-alert">
       <div class="col-md-3 col-12 ml-auto">
          <div class="card border-0 shadow-lg bg-dark">
            <div class="alert alert-sucess text-white">
                <button type="button" class="close text-white" data-dismiss="alert">x</button>
                <strong>Please wait Initiating analysis... </strong>
            </div>
          </div>
       </div>
    </div>
    <div class="row fixed-bottom ml-auto" id="complete-alert">
        <div class="col-md-3 col-12 ml-auto">
           <div class="card border-0 shadow-lg bg-dark">
             <div class="alert alert-sucess text-white">
                 <button type="button" class="close text-white" data-dismiss="alert">x</button>
                 <strong>Analysis completed successfully... </strong>
             </div>
           </div>
        </div>
     </div>
    {{-- analysis card --}}
    <div id="intellisense">
        <div id="messages"></div>
        <div class="card p-3" id="analysis-box" style="display: none;">
            <div class="d-flex justify-content-around">
                <h2 class="text-center" id="analysis-header">Analysing</h2>
                <div class="align-self-end" id="blinkers">
                  <div class="spinner-grow text-primary ml-auto" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-danger ml-auto" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                  <div class="spinner-grow text-success ml-auto" role="status">
                    <span class="sr-only">Loading...</span>
                  </div>
                </div>
              </div>
            <div class="d-inline-block float-right">
                <div class="row">
                    <div class="col-sm-6 py-4" id="pendingtickets-box" style="display: none">
                        <h6 class="sub-title">Analysing Pending Tickets </h6>
                    </div>
                    <div class="col-sm-6 py-4" style="display: none" id="pendingtickets-done">
                        <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                            <a href="http://localhost:5000" target="_blank" class="btn btn-outline-danger btn-sm ml-3">Check Report</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 pb-4" id="setpriorities-box" style="display: none">
                        <h6 class="sub-title">Setting Up Priorities</h6>
                    </div>
                    <div class="col-sm-6 pb-4"  id="setpriorities-done" style="display: none">
                        <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                            <a href="http://localhost:5000" target="_blank" class="btn btn-outline-danger btn-sm ml-3">Check Report</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 pb-4" id="jobassignment-box" style="display: none">
                        <h6 class="sub-title">Assigning Jobs </h6>
                    </div>
                    <div class="col-sm-6 pb-4" id="jobassignment-done" style="display: none">
                        <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                            <a href="http://localhost:5000" target="_blank" class="btn btn-outline-danger btn-sm ml-3">Check Report</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 pb-4" id="generatereport-box" style="display: none">
                        <h6 class="sub-title">Generating Report </h6>
                    </div>
                    <div class="col-sm-6 pb-4" id="generatereport-done" style="display: none">
                        <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                            <a href="http://localhost:5000" target="_blank" class="btn btn-outline-danger btn-sm ml-3">Check Report</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 pb-4" id="finishingup-box" style="display: none">
                        <h6 class="sub-title">Finishing Up</h6>
                    </div>
                    <div class="col-sm-6 pb-4" id="finishingup-done" style="display: none">
                        <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                            <a href="http://localhost:5000" target="_blank" class="btn btn-outline-danger btn-sm ml-3">Check Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- progress bar --}}
    <div class="progress my-3" style="display: none;" id="intellisenseprogress-box">
        <div id='animate' class="progress-bar progress-bar-striped active" style="width:0%">
            <span class="text-dark">Initiating</span>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

@section('javascript')
<script>
    $("#success-alert").hide();
    $("#complete-alert").hide();
    $('#intellisense-switch').change(function () {
      
        if ($(this).is(':checked')) {
                  
            $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
                $("#success-alert").slideUp(500);
            });
            $('#intellisenseprogress-box').show();
            $('#analysis-box').show();
            var w = 0;
            var intellisenceProgress = setInterval(function () {
                if (w == 100) {
                    $('#finishingup-done').show();
                    $('#blinkers').hide();
                    $('#analysis-header').html("Analysis Complete");

                    $("#complete-alert").fadeTo(2000, 500).slideUp(500, function() {
                    $("#complete-alert").slideUp(500);
                    });
                    clearInterval(intellisenceProgress);
                    $('#intellisenseprogress-box').hide();
                }
                else{
                    w = w % 100 + 20;
                    $('#animate').width(w + '%').text(w + '%')
                    if (w <= 20){
                    $('#pendingtickets-box').show();
                    }
                    if(w <=40 && w >= 21){
                    $('#pendingtickets-done').show();
                    $('#setpriorities-box').show();
                    }
                    if(w <=60 && w >= 41){
                    $('#setpriorities-done').show();
                    $('#jobassignment-box').show();
                    }
                    if(w <=80 && w >= 61){
                    $('#jobassignment-done').show();
                    $('#generatereport-box').show();
                    }
                    if(w <=100 && w >= 81){
                    $('#generatereport-done').show();
                    $('#finishingup-box').show();

                    }
                }
             
            }, 4000);
        }
        else{
            $('#intellisenseprogress-box').hide();
            $('#analysis-box').hide();
        }
    });

</script>
@endsection


@endsection