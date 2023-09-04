@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div>
                <img src="{{ asset('storage/' . $company->company_logo) }}">

                </img>
            </div>
            <h1>{{$company->company_name}}</h1>

        </div>

        <div>
            @foreach($employees as $employee)
                <div>
                    <h4>{{$employee->first_name}}</h4>
                </div>
            @endforeach
        </div>
    </div>
@endsection
