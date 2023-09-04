@extends('layouts.app')

@section('content')
    <div class="container d-flex align-items-center justify-content-between flex-wrap">
        <h1 class="w-100 text-center mb-4">Companies</h1>
        @if ($companies->count())
        @foreach($companies as $company)
                <div class="card mb-3 companies-card" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex">
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
                        <div class="col-md-2 d-flex justify-content-center align-items-center flex-column flex-nowrap">
                            <a class="btn btn-primary m-2" href="{{"/companies/" . $company->id}}">View</a>
                        </div>
                    </div>
                </div>
        @endforeach
            {{ $companies->links() }}
        @else
            <p class="w-100 text-center">No companies yet.</p>
        @endif
    </div>
@endsection
