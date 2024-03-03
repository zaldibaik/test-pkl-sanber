@extends('layouts.nav')

@section('content')
<div class="container">
    <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=1920&amp;q=80');">
        <span class="mask bg-gradient-primary opacity-6"></span>
    </div>
    <div class="card card-body mx-3 mx-md-4 mt-n6">
        <div class="row gx-4 mb-2">
            <div class="col-auto">
                <div class="avatar avatar-xl position-relative">
                    <img src="{{ $employee->profile_photo_path }}" alt="profile_image" class="w-100 border-radius-lg shadow-sm">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">{{ $employee->name }}</h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                <div class="nav-wrapper position-relative end-0">
                    <!-- Nav links -->
                </div>
            </div>
        </div>
        <!-- Profile information -->
        <div class="row">
            <div class="col">
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                        <div class="row">
                            <div class="col-md-8 d-flex align-items-center">
                                <h6 class="mb-0">Profile Information</h6>
                            </div>
                            <div class="col-md-4 text-end">
                                <a href="javascript:;">
                                    <i class="fas fa-user-edit text-secondary text-sm" data-bs-toggle="tooltip" data-bs-placement="top" aria-hidden="true" aria-label="Edit Profile" data-bs-original-title="Edit Profile"></i><span class="sr-only">Edit Profile</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-3">
                        <!-- Profile content -->
                        <p class="text-sm">{{ $employee->about }}</p>
                        <hr class="horizontal gray-light my-4">
                        <ul class="list-group">
                            <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">Name: {{ $employee->name }}</strong></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Position: {{ $employee->position }}</strong></li>
                            <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Salary: {{ $employee->salary }}</strong></li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Social:</strong> &nbsp;
                                <!-- Social media links -->
                            </li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Address: {{ $employee->address }}</strong>
                            </li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Country: {{ $employee->country }}</strong>
                            </li>
                            <li class="list-group-item border-0 ps-0 pb-0">
                                <strong class="text-dark text-sm">Postal Code: {{ $employee->postal_code }}</strong>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <a href="{{ route('employees.index') }}" class="btn btn-danger w-50 mt-2">Back</a>
            <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-primary w-50">Edit Profile</a>
        </div>
    </div>
</div>
@endsection
