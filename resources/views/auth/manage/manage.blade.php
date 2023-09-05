@extends('layouts.app')

@section('content')
    @if (session()->has('success') || session()->has('danger'))
        <script>
            setTimeout(function() {
                    $('.message').fadeOut('slow');}, 2000,
                $('.message').css('display', 'none')
            );
        </script>
        @if (session()->has('success'))
            <div class="text-center position-absolute card alert alert-success alert-dismissible fade show message" role="alert">
                <div class="">
                    {{ session('success') }}
                </div>
            </div>
        @else
            <div class="text-center position-absolute card alert alert-danger alert-dismissible fade show message" role="alert">
                <div class="">
                    {{ session('danger') }}
                </div>
            </div>
        @endif
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="w-100 text-center mb-4">Manage Companies</h1>
            <div class="col-md-4 d-flex flex-column">
                <form method="GET" action="#">
                    <div class="w-100 d-flex align-items-center text-center">
                        <label class="d-none" for="search">Search:</label>
                        <input
                            class="form-control"
                            type="text"
                            name="search"
                            placeholder="company name"
                            value="{{request('search')}}"
                        >
                        <button class="m-1 btn btn-secondary" style="margin-left: 10px!important;margin-right!important;: 5px;" type="submit">search</button>
                    </div>
                </form>
                <a class="btn btn-secondary mt-3" href="/admin/manage-company">View all</a>
                <a class="btn btn-secondary mt-3" href="/admin/create-company">Create a new Company</a>
                <a class="btn btn-secondary mt-3" href="/admin/manage-company">Manage existing Company</a>
            </div>
            <div class="col-md-8">
                @foreach($companies as $company)
                    <div class="col-md-12 mt-2">
                        <div class="card">
                            <div class="row no-gutters">
                                <div class="col-md-3 d-flex">
                                    <img src="{{ asset('storage/' . $company->company_logo) }}" class="card-img p-3" alt="{{$company->company_name}}">
                                </div>
                                <div class="col-md-6">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$company->company_name}}</h5>
                                        <p class="card-text">{{$company->company_website}}</p>
                                        <p class="card-text">{{$company->company_email}}</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                                <div class="col-md-3 d-flex justify-content-center align-items-center flex-column flex-nowrap">
                                    <a class="btn btn-primary m-2" href="{{"/admin/manage-company/" . $company->id}}">Edit Company</a>
                                    <form method="POST" action="/admin/{{$company->id}}/remove">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger m-2" type="submit">remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                    {{ $companies->links() }}
            </div>
        </div>
    </div>
@endsection
