@extends('layouts.app')

@section('content')
    <div class="container">
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

                <ul>
                    <li>
                        <a href="/admin/create-company">Add a new company</a>
                    </li>

                    <li>
                        <a href="/admin/manage-company">Manage an existing company</a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
