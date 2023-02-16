@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">
                    <div class="mt-1">
                        <h3>Example project to demonstrate CRUD functionality on Companies and Employees</h3>
                    </div>
                </div>
                <div class="card-body">
                    <p class="mb-0">Authorization credentials for this project:</p>
                    <ul>
                        <li><span class="fw-bold">Email: </span> admin@admin.com</li>
                        <li><span class="fw-bold">Password:</span> password</li>
                    </ul>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body row">
                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="mt-1">
                                    <h3>
                                        Companies
                                    </h3>
                                </div>
                            </div>
                            <a href="company" class="card-body d-flex mb-2 text-reset text-decoration-none link-primary">
                                <img src="{{ asset('img/nologo.jpg') }}" width="100" height="100" alt="" class="border-0">

                                <ul class="p-2">
                                    <li class="text-break list-group-item">
                                        <h5>View Companies Index</h5>
                                    </li>
                                    <li class="text-break list-group-item">{{ $companyCount }} companies in the database.</li>
                                </ul>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="mt-1">
                                    <h3>
                                        Employees
                                    </h3>
                                </div>
                            </div>
                            <a href="employee" class="card-body d-flex mb-2 text-reset text-decoration-none link-primary">
                                <img src="{{ asset('img/nologo.jpg') }}" width="100" height="100" alt="" class="border-0">

                                <ul class="p-2">
                                    <li class="text-break list-group-item">
                                        <h5>View Employees Index</h5>
                                    </li>
                                    <li class="text-break list-group-item">{{ $employeeCount }} employees in the database.</li>
                                </ul>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection