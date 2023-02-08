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
                    <p><a href="../company/{{ $employee->company->id }}">{{ $employee->company->name }}</a></p>
                    <p>{{ $employee->company->email }}</p>
                    @if($employee->company->logo)
                    <x-logo>../storage/company/logos/{{ $employee->company->logo }}</x-logo>
                    @endif
                    <p>{{ $employee->company->website }}</p>
                    <hr>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection