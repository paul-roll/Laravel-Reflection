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
                            {{ 'Search Compaines: \'' . $search . '\'' }}
                            @else
                            Index Companies
                            @endif
                        </h3>
                        <a class="mx-1 float-end" href="{{ asset('company/create') }}"><input class="btn btn-secondary" type="submit" value="Create New Company" /></a>
                    </div>
                </div>
                <div class="card-body">

                    <div class="col-md-6 mb-3">
                        <form class="input-group mb-2" action="{{ asset('company/search') }}" method="GET" role="search">
                            <input class="btn btn-outline-secondary" type="submit" value="Search" id="button-addon1" />
                            <input id="q" name="q" type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                        </form>
                        @if (isset($search))
                        <a href="{{ asset('company') }}"><input class="btn btn-outline-secondary" type="submit" value="Back to full company index" /></a>
                        @endif
                    </div>

                    {{ $companies->links() }}

                    <div class="row">
                        @if (count($companies) == 0)
                        <h3 class="text-center">No companies found!</h3>
                        @endif
                        @foreach ($companies as $company)
                        <a href="{{ asset('company/' . $company->id) }}" class="col-lg-6 d-flex mb-2 text-reset text-decoration-none link-primary">
                            @if ($company->logo)
                            <div class=""><x-logo>{{ $company->logo }}</x-logo></div>
                            @else
                            <img src="{{ asset('img/nologo.jpg') }}" width="100" height="100" alt="" class="border-0">
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