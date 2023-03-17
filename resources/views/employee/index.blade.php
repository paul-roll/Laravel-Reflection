@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="mt-1">
                        <h3 class="d-inline">
                            @if (isset($search))
                            {{ 'Search Employees: \'' . $search . '\'' }}
                            @else
                            Index Employees
                            @endif
                        </h3>
                        <a class="float-end" href="{{ asset('employee/create') }}"><input class="btn btn-secondary" type="submit" value="Create New Employee" /></a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-md-6 mb-3">
                        <form class="input-group mb-2" action="{{ asset('employee/search') }}" method="GET" role="search">
                            <input class="btn btn-outline-secondary" type="submit" value="Search" id="button-addon1" />
                            <input id="q" name="q" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" @if (isset($search)) value="{{ $search }}" @endif>
                        </form>
                        @if (isset($search))
                        <a href="{{ asset('employee') }}"><input class="btn btn-outline-secondary" type="submit" value="Back to full employee index" /></a>
                        @endif
                    </div>

                    {{ $employees->links() }}

                    <div class="row">
                        @if (count($employees) == 0)
                        <h3 class="text-center">No employees found</h3>
                        @endif
                        @foreach ($employees as $employee)
                        <a href="{{ asset('employee/' . $employee->id) }}" class="col-lg-6 d-flex mb-2 text-reset text-decoration-none link-primary">
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