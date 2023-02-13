@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                <div class="card-body">



                    {{ $companies->links() }}

                    <div class="row">
                        @foreach ($companies as $company)
                        <a href="company/{{ $company->id }}" class="col-lg-6 d-flex mb-2 text-reset text-decoration-none link-primary">
                            @if ($company->logo)
                            <div class=""><x-logo>{{ $company->logo }}</x-logo></div>
                            @else
                            <img src="{{ asset('storage/blank.jpg') }}" width="100" height="100" alt="" class="border-0">
                            @endif
                            <ul class="p-2">
                                <li class="text-break list-group-item">
                                    <h5>{{ $company->name }}</h5>
                                </li>
                                @if ($company->email)
                                <li class="text-break list-group-item">{{ $company->email }}</li>
                                @endif
                                @if ($company->website)
                                <li class="text-break list-group-item">{{ $company->website }}</li>
                                @endif
                            </ul>
                        </a>
                        @endforeach
                    </div>

                    {{ $companies->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection