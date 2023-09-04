@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1 class="mb-3">View Company Details</h1>
        <div class="row no-gutters text-start">
            <div class="col-md-12">
                <a class="btn btn-secondary" href="/">Go back</a>
            </div>
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
                    </div>
                </div>
            </div>
            <div class="col-md-12 mt-3 text-center">
                <h5>Employees:</h5>
                <ul class="list-group text-start">
                    @foreach($employees as $employee)
                   <li class="list-group-item">
                       <h6>{{$employee->first_name . " " .$employee->last_name}}</h6>
                   </li>
                    @endforeach
                </ul>
            </div>
        </div>



{{--        <div class="row no-gutters">--}}
{{--            <div class="card col-md-12 mb-3 w-100" style="max-width: 540px;">--}}
{{--                <div class="row no-gutters">--}}
{{--                    <div class="col-md-12 d-flex">--}}
{{--                        --}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="card-body">--}}
{{--                            --}}
{{--                            >--}}
{{--                            --}}
{{--                            --}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-12">--}}
{{--
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection
