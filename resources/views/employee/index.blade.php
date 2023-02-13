@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Index Employees</div>
                <div class="card-body">

                    @admin
                    <div class="mb-3">
                        Admin Links:
                        <a href="employee/create"><input type="submit" value="Create" /></a>
                    </div>
                    @endadmin

                    {{ $employees->links() }}

                    <div class="row">
                        @foreach ($employees as $employee)
                        <a href="employee/{{ $employee->id }}" class="col-lg-6 d-flex mb-2 text-reset text-decoration-none link-primary">
                            @if (($employee->company) && ($employee->company->logo))
                            <div class=""><x-logo>{{ $employee->company->logo }}</x-logo></div>
                            @else
                            <img src="{{ asset('img/nologo.jpg') }}" width="100" height="100" alt="" class="border-0">
                            @endif
                            <ul class="p-2">
                                <li class="text-break list-group-item">
                                    <h5>{{ $employee->first }} {{ $employee->last }}</h5>
                                </li>
                                @if ($employee->email)
                                <li class="text-break list-group-item">{{ $employee->email }}</li>
                                @endif
                                @if ($employee->phone)
                                <li class="text-break list-group-item">{{ $employee->phone }}</li>
                                @endif
                            </ul>
                        </a>
                        @endforeach
                    </div>

                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection