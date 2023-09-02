@extends('layouts.app')

@section('content')
    <div class="container">
        <div>
            <div>
                <igm>

                </igm>
            </div>
            <h1>{{$company->company_name}}</h1>

        </div>

        @foreach($employees as $employee)
            <div>
                <h4>{{$employee->first_name}}</h4>
            </div>
        @endforeach
    </div>
@endsection
