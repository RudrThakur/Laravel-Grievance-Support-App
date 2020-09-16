@extends('user.partials.master')

@section('title','Service Details')

@section('content')
    @include('user.partials.errors')
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
                                        <th>Worker Assigned</th>
                                        <td>{{ $serviceAction->worker ? $serviceAction->worker->name : 'No Data Available'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Fund Amount</th>
                                        <td>{{ $serviceAction->fund ? $serviceAction->fund : 'No Data Available'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Approvals Required</th>
                                        @if($serviceActionAuthorities)
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
                                        @endif
                                    </tr>
                                    <tr>
                                        <th>Admin Remarks</th>
                                        <td>{{ $serviceAction->adminremarks}}</td>
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
                                    <form action="/service-action/{{ $service->id }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="worker_id">Assign Worker</label>
                                            <select class="form-control" id="worker_id" name="worker_id">
                                                <option value="">Select Worker</option>
                                                @foreach($workers as $worker)
                                                    <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="eta">Select Estimated Time Amount(In Days)</label>
                                            <select class="form-control" id="eta" name="eta">
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
                                            <button type="submit" class="btn btn-primary">Assign</button>
                                        </div>
                                    </form>
                                @else
                                    <table class="table data-table">
                                        <tbody>
                                        <tr>
                                            <th>Estimated Time Amount</th>
                                            <td>{{ $serviceAction ? $serviceAction->eta ? $serviceAction->eta. ' Days' : 'No Data Available' : 'No Data Available'}}</td>
                                        </tr>
                                        <tr>
                                            <th>Actual TAT</th>
                                            <td>{{ $serviceAction ? $serviceAction->tat ? $serviceAction->tat. ' Days' : 'No Data Available' : 'No Data Available' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="text-center">
                                        <button class="btn btn-primary">Close Ticket</button>
                                    </div>
                                @endif
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
