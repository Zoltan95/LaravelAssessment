@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="w-100 text-center mb-4">Welcome</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>

                <div class="row text-center">
                    <div class="col-mb-12 mt-3">
                        <a class="btn btn-secondary" href="admin/create-company">Create a new Company</a>
                    </div>
                    <div class="col-mb-12 mt-3">
                        <a class="btn btn-secondary" href="admin/manage-company">Manage existing Company</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
