@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Placeholder</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.update', $company) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <x-form.input name="name" :value="old('name', $company->name)" />
                        <x-form.input name="email" type="email" :value="old('email', $company->email)" />

                        <x-form.file name="logo" :value="old('logo', $company->logo)" />

                        <x-form.input name="website" :value="old('website', $company->website)" />

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