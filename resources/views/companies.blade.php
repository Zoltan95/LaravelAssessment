@extends('layouts.app')

@section('content')
    <div class="container">
    @foreach($companies as $company)
        <div>
            <a href="/companies/{{$company->id}}"><h2>{{$company->company_name}}</h2></a>
            <p>Lorem ipsum dolor al.</p>
        </div>
    @endforeach
    </div>
@endsection
