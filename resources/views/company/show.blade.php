@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company {{ $company->id }}</div>
                <div class="card-body">

                    <div class="alert alert-success" role="alert">
                        <h3>{{ $company->name }}</h3>
                        <p>{{ $company->email }}</p>
                        <p>{{ $company->logo }}</p>
                        <p>{{ $company->website }}</p>
                    </div>

                    @foreach ($company->employees as $employee)
                    <hr>
                    <p>{{ $employee->first }} {{ $employee->last }}</p>
                    <p>{{ $employee->email }}</p>
                    <p>{{ $employee->phone }}</p>
                    @endforeach
                    <hr>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection