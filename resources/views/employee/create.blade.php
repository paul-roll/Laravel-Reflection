@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="mt-1">
                        <h3>
                            Create Employee
                        </h3>
                    </div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-form.input label="first name" name="first" />
                        <x-form.input label="last name" name="last" />

                        <x-form.dropdown label="company name" name="company_id" :list="$companies" :old="old('company_id')" />

                        <x-form.input label="email address" name="email" type="email" />
                        <x-form.input label="phone number" name="phone" />

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
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