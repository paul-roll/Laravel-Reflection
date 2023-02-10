@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>
                <div class="card-body">

                    @admin
                    <div class="mb-2">
                        Admin Links:
                        <a href="company/create"><input type="submit" value="Create" /></a>
                    </div>
                    @endadmin

                    @foreach ($companies as $company)
                    <div class="alert alert-success" role="alert">
                        <h3><a href="company/{{ $company->id }}">{{ $company->name }}</a></h3>
                        <p>{{ $company->email }}</p>
                        @if($company->logo)
                        <x-logo>{{ $company->logo }}</x-logo>
                        @endif
                        <p>{{ $company->website }}</p>
                    </div>
                    @endforeach

                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection