@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>
                <div class="card-body">


                    @foreach ($employees as $employee)
                    <div class="alert alert-success" role="alert">
                        <h3><a href="employee/{{ $employee->id }}">{{ $employee->first }} {{ $employee->last }}</a></h3>
                        <p>{{ $employee->email }}</p>
                        <p>{{ $employee->phone }}</p>
                    </div>
                    @endforeach

                    Placeholder
                </div>
            </div>
        </div>
    </div>
</div>
@endsection