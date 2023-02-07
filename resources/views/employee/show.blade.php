@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employee {{ $employee->id }}</div>
                <div class="card-body">

                    <div class="alert alert-success" role="alert">
                        <h3>{{ $employee->first }} {{ $employee->last }}</h3>
                        <p>{{ $employee->email }}</p>
                        <p>{{ $employee->phone }}</p>
                    </div>

                    <hr>

                    @if ($employee->company)
                    <p>{{ $employee->company->name }}</p>
                    <p>{{ $employee->company->email }}</p>
                    <p>{{ $employee->company->logo }}</p>
                    <p>{{ $employee->company->website }}</p>
                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection