@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @foreach($companies as $company)
                    <div>
                        <a href="/companies/{{$company->id}}"><h2>{{$company->company_name}}</h2></a>
                        <p>Lorem ipsum dolor al.</p>
                        <a href="manage-company/{{$company->id}}">Edit</a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
