@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Placeholder</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.update', $employee) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-form.input name="first" value="{{ old('first', $employee->first) }}" />
                        <x-form.input name="last" value="{{ old('last', $employee->last) }}" />
                        <x-form.input name="company_id" value="{{ old('company_id', $employee->company_id) }}" />
                        <x-form.input name="email" type="email" value="{{ old('email', $employee->email) }}" />
                        <x-form.input name="phone" value="{{ old('phone', $employee->phone) }}" />

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