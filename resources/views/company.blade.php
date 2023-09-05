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
    <div class="container text-center">
        <h1 class="mb-3">View Company Details</h1>
        <div class="row no-gutters text-start">
            <div class="col-md-12">
                <a class="btn btn-secondary" href="/">Go back</a>
            </div>
            <div class="col-md-12 mt-3">
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
                            <div class="row {{$employee->id}}" style="align-items: center;">
                                <div class="col-md-2 d-flex flex-column align-items-start align-content-center">
                                    <small>Employee Name:</small>
                                    <p class="m-0">{{$employee->first_name . " " . $employee->last_name}}</p>
                                </div>
                                <div class="col-md-2 d-flex flex-column align-items-start align-content-center">
                                    <small>Company</small>
                                    <p class="m-0">{{$company->company_name}}</p>
                                </div>
                                <div class="col-md-2 d-flex flex-column align-items-start align-content-center">
                                    <small>Phone</small>
                                    <p class="m-0">{{$employee->phone}}</p>
                                </div>
                                <div class="col-md-3 d-flex flex-column align-items-start align-content-center">
                                    <small>Email</small>
                                    <p class="m-0">{{$employee->email}}</p>
                                </div>
                                <script>
                                    let id{{$employee->id}} = ["{{$employee->id}}", "{{$employee->first_name}}", "{{$employee->last_name}}", "{{$employee->phone}}", "{{$employee->email}}"];
                                </script>
                                @can('admin')
                                <div class="col-md-2 d-flex flex-column align-items-end align-content-center" style="padding-right: 25px">
                                    <button class="btn btn-primary edit-form"
                                            onclick="editEmployee(id{{$employee->id}})">Edit</button>
                                </div>
                                <div class="col-md-1 d-flex flex-column align-items-end align-content-center">
                                    <form method="POST" action="/admin/remove/{{$employee->id}}">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger w-100" type="submit">Remove</button>
                                    </form>
                                </div>
                                @endcan
                            </div>
                        </li>
                    @endforeach
                        {{ $employees->links() }}
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
