@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Company {{ $company->id }}</div>
                <div class="card-body">

                    @admin
                    <div class="mb-2">
                        Admin Links:
                        <a href="{{ $company->id }}/edit"><input type="submit" value="Edit" /></a>
                        <form class="d-inline" method="POST" action="{{ $company->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" />
                        </form>
                    </div>
                    @endadmin

                    <div class="alert alert-success" role="alert">
                        <h3>{{ $company->name }}</h3>
                        <p>{{ $company->email }}</p>
                        @if($company->logo)
                        <x-logo>../storage/company/logos/{{ $company->logo }}</x-logo>
                        @endif
                        <p>{{ $company->website }}</p>
                    </div>

                    @foreach ($company->employees as $employee)
                    <hr>
                    <p><a href="../employee/{{ $employee->id }}">{{ $employee->first }} {{ $employee->last }}</a></p>
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