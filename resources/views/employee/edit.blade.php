@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header">
                    <div class="mt-1">
                        <h3 class="d-inline">
                            Edit Employee
                        </h3>
                        <form class="mx-1 float-end" class="d-inline" method="POST" action="{{ route('employee.destroy', $employee) }}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete" />
                        </form>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $employee) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-form.input label="first name" name="first" value="{{ old('first', $employee->first) }}" />
                        <x-form.input label="last name" name="last" value="{{ old('last', $employee->last) }}" />

                        <x-form.dropdown label="company name" name="company_id" :list="$companies" :old="old('company_id', $employee->company_id)" />

                        <x-form.input label="email address" name="email" type="email" value="{{ old('email', $employee->email) }}" />
                        <x-form.input label="phone number" name="phone" value="{{ old('phone', $employee->phone) }}" />

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection