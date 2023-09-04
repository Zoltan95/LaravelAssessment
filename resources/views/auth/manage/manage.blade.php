@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h1 class="w-100 text-center mb-4">Manage Companies</h1>
            <div class="col-md-4 d-flex flex-column">
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

                                        <button class="btn btn-primary m-2" type="submit">remove</button>
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
