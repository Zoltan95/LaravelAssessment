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
    <div class="container d-flex align-items-center justify-content-center flex-wrap">
        <h1 class="w-100 text-center mb-4">Companies</h1>
        <div class="search-bar w-100 mb-3 d-flex">
            <div class=" w-100 d2 d-flex">
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
            </div>
        </div>
        @if (!empty(request('search')))
            <div class="w-100 d1 d-flex align-items-start text-start" style="margin-left: 5px;margin-right: 10px;">
                <a class="p-1 ink-danger" href="/">Home &#92;</a>
                <p class="p-1 d-inline">{{" ".request('search')}}</p>
            </div>
        @endif
        @if ($companies->count())
            <div class="d-flex companies-box flex-wrap justify-content-between">
        @foreach($companies as $company)
                <div class="card mb-3 companies-card flex-grow-1" style="max-width: 540px;">
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
            </div>
            {{ $companies->links() }}
        @else
            <p class="w-100 text-center">No companies yet.</p>
        @endif
    </div>
@endsection
