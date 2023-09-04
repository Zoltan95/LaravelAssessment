@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="w-100 text-center mb-4">Create a new Company</h1>
        <div class="row justify-content-center">
            <div class="col-md-4 d-flex flex-column">
                <a class="btn btn-secondary mt-3" href="/admin/create-company">Create a new Company</a>
                <a class="btn btn-secondary mt-3" href="/admin/manage-company">Manage existing Company</a>
            </div>
            <div class="col-md-8">
                <form method="POST" action="/admin/create-new" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="company_name">Company Name:</label>
                        <input
                            type="text"
                            name="company_name"
                            class="form-control"
                            id="company_name"
                            value="{{old('company_name')}}"
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
                            value="{{old('company_email')}}"
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
                            value="{{old('company_website')}}"
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
