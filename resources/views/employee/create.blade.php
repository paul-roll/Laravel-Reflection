@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Employee</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employee.store') }}" enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="first" />
                        <x-form.input name="last" />

                        <x-form.dropdown name="company_id" :list="$companies" :old="old('company_id')" />

                        <x-form.input name="email" type="email" />
                        <x-form.input name="phone" />

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