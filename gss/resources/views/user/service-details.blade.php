@extends('user.partials.master')

@section('title','Service Details')

@section('content')
    @include('user.partials.errors')
    @include('sweetalert::alert')
    <div class="card">
        <div class="card-body row">
            <div class="col-lg-5 col-xl-5 col-md-12 col-12">
                <h6 class="text-center">Service - Details</h6>
                <table class="table data-table">
                    <tbody>
                    <tr>
                        <th>Priority</th>
                        <td>{{ $service->priority->priority }}</td>
                    </tr>
                    <tr>
                        <th>Department</th>
                        <td>{{ $service->department }}</td>
                    </tr>
                    <tr>
                        <th>Service-ID</th>
                        <td id="service-id">{{ $service->id }}</td>
                    </tr>
                    <tr>
                        <th>Service Category</th>
                        <td>
                            {{ $service->category }}</td>
                    </tr>
                    <tr>
                        <th>Service Subcategory</th>
                        <td>
                            {{ $service->subcategory }}</td>
                    </tr>
                    <tr>
                        <th>Block name</th>
                        <td>
                            {{ $service->block }}</td>
                    </tr>
                    <tr>
                        <th>Floor</th>
                        <td>
                            {{ $service->floor }}</td>
                    </tr>
                    <tr>
                        <th>Room No</th>
                        <td>
                            {{ $service->room }}</td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td>
                            {{ $service->quantity }}</td>
                    <tr>
                        <th>Description</th>
                        <td>
                            {{ $service->description }}</td>
                    </tr>
                    <tr>
                        <th>Assetcode</th>
                        <td>
                            {{ $service->assetcode ? $service->assetcode : 'No Data Available'}}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>
                            {{ $service->created_at->toFormattedDateString() }}</td>
                    </tr>
                    <tr>
                        <th>Updated At</th>
                        <td>
                            {{ $service->updated_at->diffForHumans() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>

            <div class="col-xl-7 col-lg-7 col-md-12 col-12 d-block bg-light p-4">
                <div class="card">
                    <div class="card-body row">
                        <div class="col-lg-12 col-xl-12 col-md-12 col-12">
                            @if($serviceAction)
                                <h6 class="text-center">Prior Service Action</h6>
                                <table class="table data-table">
                                    <tbody>
                                    <tr>
                                        <th>Fund Amount</th>
                                        <td>{{ $serviceAction->fund ? $serviceAction->fund : 'No Data Available'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Approvals Required</th>
                                        @if(!$serviceActionAuthorities->isEmpty())
                                            <td>
                                                @foreach($serviceActionAuthorities as $serviceActionAuthority)
                                                    {{ $authorities->where('id', $serviceActionAuthority->authority_id)->first()->name }}
                                                    @if($serviceActionAuthority->approved == 1)
                                                        <i class="fas fa-check-circle" style="color: green;"></i>
                                                        <span
                                                            class="authority-remarks">Remarks: {{ $serviceActionAuthority->remarks }}</span>
                                                        | <br>
                                                    @elseif(is_null($serviceActionAuthority->approved))
                                                        <i class="fas fa-exclamation-circle" style="color: black;"></i>
                                                        |

                                                    @else
                                                        <i class="fas fa-times-circle" style="color: red;"></i>
                                                        <span
                                                            class="authority-remarks">Remarks: {{ $serviceActionAuthority->remarks }}</span>
                                                        | <br>
                                                    @endif

                                                @endforeach
                                            </td>
                                        @else
                                            <td>
                                                No Data Available
                                            </td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Admin Remarks</th>
                                        <td>{{ $serviceAction->adminremarks ? $serviceAction->adminremarks : 'No Data Available'}}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            @else
                                @if(auth()->user()->can('service-action'))
                                    <h6 class="text-center">Service - Action</h6>
                                    <hr>
                                    @include('user.partials.forms.service-action-form')
                                @endif
                            @endif

                            @if($serviceAction && !$isApprovedByCurrentUser
                                   && $isApprovalRequiredByCurrentUser
                                   && auth()->user()->can('service-approval'))

                                <h6 class="text-center">Service - Approval</h6>
                                <hr>
                                @include('user.partials.forms.service-approval-form')

                            @endif

                            @if($pendingApprovals && $pendingApprovals->isEmpty())
                                <h6 class="text-center">Work - History</h6>
                                <hr>
                                @if(!$serviceAction->worker)
                                    <form action="/work-history/{{ $serviceAction->id }}" class="wait-alert" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="worker_id">Assign Worker</label>
                                            <select class="form-control assign_worker_fields" id="worker_id" name="worker_id">
                                                <option value="">Select Worker</option>
                                                @foreach($workers as $worker)
                                                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" value="auto_assign_worker"
                                                           name="auto_assign_worker"
                                                           id="auto_assign_worker">Auto Assign
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="eta">Select Estimated Time Amount(In Days)</label>
                                            <select class="form-control assign_worker_fields" id="eta" name="eta">
                                                <option value="">Select ETA</option>
                                                <option value="1">1 Day</option>
                                                <option value="2">2 Days</option>
                                                <option value="3">3 Days</option>
                                                <option value="4">4 Days</option>
                                                <option value="5">5 Days</option>
                                                <option value="6">6 Days</option>
                                                <option value="7">7 Days</option>
                                                <option value="8">8 Days</option>
                                                <option value="9">9 Days</option>
                                                <option value="10">10 Days</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Message:</label>
                                            <textarea class="form-control" id="admin-remarks" name="adminremarks"
                                                      rows="4"
                                                      cols="20"></textarea>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary" data-toggle="modal" id="assign-worker" data-backdrop="static" data-keyboard="false">Assign</button>
                                        </div>
                                    </form>
                                @else
                                    <table class="table data-table">
                                        <tbody>
                                        <tr>
                                            <th>Worker Assigned</th>
                                            <td>{{ $serviceAction->worker ? $serviceAction->worker->name : 'No Data Available'}}</td>
                                        </tr>
                                        <tr>

                                            <th>Estimated Time Amount</th>
                                            <td>{{ $serviceAction ?
                                                ($serviceAction->eta ?
                                                ($serviceAction->eta == 1 ? $serviceAction->eta.' Day' : $serviceAction->eta.' Days')
                                                :'No Data Available')
                                                : 'No Data Available' }}</td>
                                        </tr>
                                        <tr>
                                            <th>Actual TAT</th>
                                            <td>{{ $serviceAction ?
                                                ($serviceAction->tat ?
                                                ($serviceAction->tat == 1 ? $serviceAction->tat.' Day' : $serviceAction->tat.' Days')
                                                :'No Data Available')
                                                : 'No Data Available' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    @if(!$isClosed)
                                        <div class="text-center">
                                            <a class="btn btn-primary" href="/close-ticket/{{ $service->ticket_id }}">Close
                                                Ticket</a>
                                        </div>
                                    @endif
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="hungarian">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header" >
              <h4 class="modal-title">Auto Assigning in Progress </h4>
              {{-- <button type="button" class="close" data-dismiss="modal">&times;</button> --}}
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <div class="progress my-3" style="display: none;" id="hungarian-box">
                    <div id='animate' class="progress-bar progress-bar-striped progress-bar-animated bg-dark active" style="width:0%">
                        <span class="text-dark">Initiating</span>
                    </div>
                </div>
                <div class="card p-3" id="analysis-box" style="display: none;">
                    <div class="d-flex justify-content-around">
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
                                <h6 class="sub-title">Fetching All Workers</h6>
                            </div>
                            <div class="col-sm-6 py-4" style="display: none" id="pendingtickets-done">
                                <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i> Available workers-{{ $workers->count() }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-4" id="setpriorities-box" style="display: none">
                                <h6 class="sub-title">Sorting Workers</h6>
                            </div>
                            <div class="col-sm-6 pb-4"  id="setpriorities-done" style="display: none">
                                <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-4" id="jobassignment-box" style="display: none">
                                <h6 class="sub-title">Checking Availability</h6>
                            </div>
                            <div class="col-sm-6 pb-4" id="jobassignment-done" style="display: none">
                                <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-4" id="generatereport-box" style="display: none">
                                <h6 class="sub-title">Assigning Work </h6>
                            </div>
                            <div class="col-sm-6 pb-4" id="generatereport-done" style="display: none">
                                <div class="feeds-left font-weight-bolder"><i class="fas fa-check-circle text-success fa-2x"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 pb-4 text-center" id="finishingup-box" style="display: none">
                                <h3 class="sub-title">Please wait ..</h3>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- else part --}}
                <div id="no-auto-assign">
                    <h3 class="text-center text-danger" id="no-auto-assign-text">Please wait ...</h3>
                    <div class="float-right">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
            
            {{-- <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div> --}}
            
          </div>
        </div>
    </div>

@endsection
@section('javascript')
   <script>
        $('.modal-header').hide();
        $('#no-auto-assign').hide();
        $('#assign-worker').on('click', function (event) {            
            event.preventDefault();
            var name = $('#worker_id option:selected').val();
            var time = $('#eta option:selected').val();
            var message = $('#admin-remarks').val();

            if(document.getElementById('auto_assign_worker').checked){
                $('#hungarian').modal('show');
                $('.modal-header').show();
                $('#hungarian-box').show();
                $('#analysis-box').show();
                var w = 0;
            var intellisenceProgress = setInterval(function () {
                if (w == 100) {
                    $('#finishingup-done').show();
                    $('#blinkers').hide();
                    clearInterval(intellisenceProgress);
                    $('#hungarian-box').hide();
                    $(".wait-alert").submit();
                    $("#hungarian").modal('hide');
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

            else if(name!= null && time!= null && message!=""){
                    $('#hungarian').modal('hide');
                    $(".wait-alert").submit();
            }
            else{
                    $('#hungarian').modal('show');
                    $('#no-auto-assign').show();
                    $("#no-auto-assign-text").html("All the fields are mandatory");
            }   
        });  
   </script>
@endsection


