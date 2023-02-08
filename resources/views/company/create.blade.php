@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Placeholder</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('company.store') }}">
                        @csrf

                        <!-- <x-form.input name="name" required /> -->
                        <x-form.input name="name" />
                        <x-form.input name="email" type="email" />
                        <x-form.input name="logo" disabled placeholder="#TODO"/>
                        <x-form.input name="website" />

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