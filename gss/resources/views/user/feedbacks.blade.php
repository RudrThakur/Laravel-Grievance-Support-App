@extends('user.partials.master')

@section('title', 'Tickets Feedback')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        @include('sweetalert::alert')
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tickets Feedback</h1>
        <p class="mb-4">These are the Feedbacks given by the users for their tickets</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Raised By</th>
                            <th>Type</th>
                            <th>Rating</th>
                            <th>Message</th>
                            <th>Closed At</th>
                            <th>Disturbing Factors</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Ticket Id</th>
                            <th>Raised By</th>
                            <th>Type</th>
                            <th>Rating</th>
                            <th>Message</th>
                            <th>Closed At</th>
                            <th>Disturbing Factors</th>
                        </tr>
                        </tfoot>
                        <tbody>

                        @foreach($feedbacks as $feedback)
                        
                            <tr>
                                <td>{{ $feedback->id }}</td>
                                <td>{{ $feedback->user->name }}</td>
                                <td>{{ $feedback->ticket->type->type }}</td>
                                <td>{{ $feedback->rating }}</td>
                                <td>{{ $feedback->message }}</td>
                                <td>{{ $feedback->ticket->updated_at }}</td>
                                <td>{{ $feedback->admin?'admin,':'' }}
                                {{ $feedback->web_app?'web-app,':'' }}
                                {{ $feedback->management?'management':'' }}
                                {{ $feedback->work?'work,':'' }}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

 
    </div>
    <!-- /.container-fluid -->

@endsection
