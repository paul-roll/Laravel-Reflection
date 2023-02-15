@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Show Employee
                    <div class="float-end">
                        Admin Links:
                        <a href="{{ asset('employee/' . $employee->id . '/edit') }}"><input type="submit" value="Edit" /></a>
                        <form class="d-inline" method="POST" action="{{ $employee->id }}">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Delete" />
                        </form>
                    </div>
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-6 d-flex mb-2">

                            <ul class="p-2">
                                <li class="text-break list-group-item">
                                    <h5>{{ $employee->first }} {{ $employee->last }}</h5>
                                </li>
                                @if ($employee->email)
                                <li class="text-break list-group-item"><a class="text-reset text-decoration-none link-primary" href="mailto:{{ $employee->email }}">{{ $employee->email }}</a></li>
                                @endif
                                @if ($employee->phone)
                                <li class="text-break list-group-item"><a class="text-reset text-decoration-none link-primary" href="tel:{{ $employee->phone }}">{{ $employee->phone }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            @if ($employee->company)
            <div class="card mt-4">
                <div class="card-header">Company</div>
                <div class="card-body">
                    <div class="row">
                        <a href="{{ asset('../company/' . $employee->company->id) }}" class="d-flex mb-2 text-reset text-decoration-none link-primary">
                            @if (($employee->company) && ($employee->company->logo))
                            <div class=""><x-logo>{{ $employee->company->logo }}</x-logo></div>
                            @else
                            <img src="{{ asset('img/nologo.jpg') }}" width="100" height="100" alt="" class="border-0">
                            @endif
                            <ul class="p-2">
                                <li class="text-break list-group-item">
                                    <h5>{{ $employee->company->name }}</h5>
                                </li>
                                @if ($employee->company->email)
                                <li class="text-break list-group-item">{{ $employee->company->email }}</li>
                                @endif
                                @if ($employee->company->website)
                                <li class="text-break list-group-item">{{ $employee->company->website }}</li>
                                @endif
                            </ul>
                        </a>
                    </div>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection