@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="POST" action="/admin/manage-company/edit/{{$company->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="company_name">Company Name:</label>
                        <input
                            type="text"
                            name="company_name"
                            class="form-control"
                            id="company_name"
                            value="{{old('company_name', $company->company_name)}}"
                        >
                        @error('company_name')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company_email">Company Email:</label>
                        <input
                            type="email"
                            name="company_email"
                            class="form-control"
                            id="company_email"
                            value="{{old('company_name', $company->company_email)}}"
                        >
                        @error('company_email')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company_website">Company Website:</label>
                        <input
                            type="text"
                            name="company_website"
                            class="form-control"
                            id="company_website"
                            value="{{old('company_name', $company->company_website)}}"
                        >
                        @error('company_website')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="company_website">Company Logo:</label>
                        <input
                            type="file"
                            name="company_logo"
                            class="form-control"
                            id="company_logo"
                        >
                        @error('company_logo')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>


                    <button class="mt-3 btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
