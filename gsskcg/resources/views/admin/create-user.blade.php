@extends('admin.partials.master')

@section('title', 'Admin - Create User')

@section('content')

<h3 class="text-center">Create User</h3>
<form id="createuser-form" class="card col-md-10 col-12 mx-auto my-4 p-5">
    @csrf
    <div class="form-group">
        <label for="username">User Name</label>
        <input type="text" class="form-control" id="username" name="username" placeholder="Enter User Name">
    </div>
    <div class="form-group">
        <label for="Useremail">User Email</label>
        <input type="text" class="form-control" id="useremail" name="useremail" placeholder="Enter User Email">
    </div>
    <div class="form-group">
        <label for="institutionalid">User Institutional Id</label>
        <input type="text" class="form-control" id="institutionalid" name="institutionalid"
            placeholder="Enter User Institutional Id">
    </div>
    <div class="form-group">
        <label for="Userpassword">User Phone</label>
        <input type="text" class="form-control" id="userphone" name="userphone" placeholder="Enter User Phone">
    </div>
    <div class="form-group">
        <label for="userrole">User Role</label>
        <input type="text" class="form-control" id="userrole" name="userrole" placeholder="Enter User Role">
    </div>
    <div class="form-group">
        <label for="userdepartment">Department</label>
        <select id="userdepartment" name="userdepartment" class="form-control">
            <option value="">Select Department</option>
            <option value="">N.A</option>

            {{-- @foreach ($departmentList as $department)
            <option value="{{ $department->id}}">{{ $department->departmentname}}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="form-group">
        <label for="userdesignation">Designation</label>
        <select id="userdesignation" name="userdesignation" class="form-control">
            <option value="">Select Designation</option>
            <option value="">N.A</option>
            {{-- @foreach ($designationList as $designation)
            <option value="{{ $designation->id}}">{{ $designation->designationname}}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="form-group">
        <label for="useraccesslevel">Access Level</label>
        <select id="useraccesslevel" name="useraccesslevel" class="form-control">
            <option value="">Select Access Level</option>

            {{-- @foreach ($accesslevelList as $accesslevel)
            <option value="{{ $accesslevel->id}}">{{ $accesslevel->leveltype}}</option>
            @endforeach --}}
        </select>
    </div>
    <div class="form-group">
        <label for="userpassword">Password</label>
        <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Enter Password">
    </div>
    <button type="submit" class="btn btn-primary w-10 m-auto">Submit</button>
</form>

@endsection