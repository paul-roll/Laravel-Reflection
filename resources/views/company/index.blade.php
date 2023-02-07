@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>
                <div class="card-body">


                    @foreach ($companies as $company)
                    <div class="alert alert-success" role="alert">
                        <h3>{{ $company->name }}</h3>
                        <p>{{ $company->email }}</p>
                        <p>{{ $company->logo }}</p>
                        <p>{{ $company->website }}</p>
                    </div>
                    @endforeach

                    Placeholder
                </div>
            </div>
        </div>
    </div>
</div>
@endsection