@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="w-100 text-center mb-4">Welcome {{auth()->user()->name}}</h1>
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (session()->has('success'))
                <script>
                    setTimeout(function() {
                            $('.message').fadeOut('slow');}, 2000,
                        $('.message').css('display', 'none')
                    );
                </script>
                <div class="text-center position-absolute card alert alert-success alert-dismissible fade show message" role="alert">
                    <div class="">
                        {{ session('success') }}
                    </div>
                </div>
                @endif
                </div>
            </div>
        </div>
        <div class="d-block text-center">
            <div class="col-mb-12 mt-3">
                <a class="btn btn-secondary" href="admin/create-company">Create a new Company</a>
            </div>
            <div class="col-mb-12 mt-3">
                <a class="btn btn-secondary" href="admin/manage-company">Manage existing Company</a>
            </div>
            <div class="col-mb-12 mt-3">
                <a class="btn btn-secondary" href="/">View all Companies</a>
            </div>
        </div>
    </div>
@endsection
