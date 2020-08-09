@extends('user.partials.master')

@section('title','Profile')

@section('content')
    <div class="card">
        <div class="card-body row">
            <div class="col-lg-5 col-xl-5 col-md-12 col-12">
                <h6 class="text-center">Your Profile</h6>
                <table class="table data-table">
                    <tbody>
                    <tr>
                        <th>User-ID</th>
                        <td>{{ $user->id }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
