@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                <div class="card-header">Company
                    @admin
                    <div class="float-end">
                        Admin Links:
                        <a href="{{ $company->id }}/edit"><input type="submit" value="Edit" /></a>
                        <form class="d-inline" method="POST" action="{{ $company->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" />
                        </form>
                    </div>
                    @endadmin

                </div>
                <div class="card-body">



                    <div class="row">
                        <div class="col-lg-6 d-flex mb-2">
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
                                <li class="text-break list-group-item"><a class="text-reset text-decoration-none link-primary" href = "mailto:{{ $company->email }}">{{ $company->email }}</a></li>
                                @endif
                                @if ($company->website)
                                <li class="text-break list-group-item"><a class="text-reset text-decoration-none link-primary" target="_blank" href="http://{{ $company->website }}">{{ $company->website }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @if (count($company->employees))
            <div class="card mt-4">
                <div class="card-header">Employees</div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($company->employees as $employee)
                        <a href="../employee/{{ $employee->id }}" class="col-lg-6 col-xxl-4 d-flex mb-2 text-reset text-decoration-none link-primary">
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
                </div>
            </div>
            @endif


        </div>
    </div>
</div>
@endsection