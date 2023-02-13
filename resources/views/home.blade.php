@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body row">
                    @auth
                    <!-- {{ __('You are logged in!') }} -->
                    @endauth



                    <div class="col-lg-6 mb-3">
                        <div class="card">
                            <div class="card-header">
                                Companies
                                @admin
                                <div class="float-end">
                                    Admin Links:
                                    <a href="company/create"><input type="submit" value="Create" /></a>
                                </div>
                                @endadmin
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
                                Employees
                                @admin
                                <div class="float-end">
                                    Admin Links:
                                    <a href="employee/create"><input type="submit" value="Create" /></a>
                                </div>
                                @endadmin
                            </div>
                            <a href="company" class="card-body d-flex mb-2 text-reset text-decoration-none link-primary">
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