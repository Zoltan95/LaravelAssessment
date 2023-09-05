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
    <div class="container">
        <h1 class="w-100 text-center mb-4">Editing: {{$company->company_name}}</h1>
        <div class="row justify-content-center">
            <h1></h1>
            <div class="col-md-4 d-flex flex-column">
                <a class="btn btn-secondary mt-3" href="/admin/create-company">Create a new Company</a>
                <a class="btn btn-secondary mt-3" href="/admin/manage-company">Manage existing Companies</a>
                <form method="POST" action="/admin/{{$company->id}}/remove">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger w-100 mt-3" type="submit">Remove Company</button>
                </form>
            </div>
            <div class="col-md-8">
                <form class="mt-3" method="POST" action="/admin/manage-company/edit/{{$company->id}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group mb-2">
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

                    <div class="form-group mb-2">
                        <label for="company_email">Company Email:</label>
                        <input
                            type="email"
                            name="company_email"
                            class="form-control"
                            id="company_email"
                            value="{{old('company_email', $company->company_email)}}"
                        >
                        @error('company_email')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="company_website">Company Website:</label>
                        <input
                            type="text"
                            name="company_website"
                            class="form-control"
                            id="company_website"
                            value="{{old('company_website', $company->company_website)}}"
                        >
                        @error('company_website')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group mb-2">
                        <label for="company_website">Company Logo:</label>
                        <input
                            type="file"
                            name="company_logo"
                            class="form-control"
                            id="company_logo"
                        >
                        <img style="margin-top: 1.5em; width: 150px; height:150px; " src="{{ asset('storage/' . $company->company_logo) }}" alt="{{$company->company_name}}">
                        @error('company_logo')
                        <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                        @enderror
                    </div>


                    <button class="mt-3 btn btn-primary" type="submit">Submit</button>
                </form>
            </div>
            <h5 class="col-md-12 text-center">Employees:</h5>
            <div class="col-md-12 d-flex flex-column">
                <form class="mt-3" method="POST" action="/admin/manage-company/edit/{{ $company->id }}/add-employee">
                    @csrf
                    <div class="row">
                        <div class="col-md-2 d-flex flex-column">
                            <label class="d-none" for="employee_first-name">First Name</label>
                            <input
                                class="form-control"
                                type="text"
                                name="first_name"
                                placeholder="First Name"
                            >
                            @error('first_name')
                            <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-2 d-flex flex-column">
                            <label class="d-none" for="employee_last-name">Last Name</label>
                            <input
                                class="form-control"
                                type="text"
                                name="last_name"
                                placeholder="Last Name"
                            >
                            @error('last_name')
                            <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-2 d-flex flex-column">
                            <label class="d-none" for="employee_company">Company</label>
                            <input
                                class="form-control"
                                type="text"
                                value="{{$company->company_name}}"
                                disabled

                            >
                        </div>
                        <div class="col-md-2 d-flex flex-column">
                            <label class="d-none" for="employee_company">Email</label>
                            <input
                                class="form-control"
                                type="email"
                                name="email"
                                placeholder="Email"

                            >
                            @error('email')
                            <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-2 d-flex flex-column">
                            <label class="d-none" for="employee_company">Phone</label>
                            <input
                                class="form-control"
                                type="text"
                                name="phone"
                                placeholder="Phone"

                            >
                            @error('phone')
                            <p class="invalid-feedback" style="display: block" >{{$message}}</p>
                            @enderror
                        </div>
                        <div class="col-md-2 d-flex flex-column">
                            <button class="btn btn-primary btn-employee" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 mt-3 text-center">
                <ul class="list-group text-start">
                    <script>
                        let s;
                        function editEmployee(e) {
                            $('#edit_employee').attr('action', `/admin/edit-employee/${e[0]}`);
                            $('#editEmployee-first_name').val(e[1]);
                            $('#editEmployee-last_name').val(e[2]);
                            $('#editEmployee-email').val(e[4]);
                            $('#editEmployee-phone').val(e[3]);
                        }
                    </script>
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
                            </div>
                        </li>
                    @endforeach
                    {{ $employees->links() }}
                </ul>
            </div>
        </div>
    </div>
    <div class="edit-employee d-none d-flex justify-content-center align-items-center">
        <div class="container">
            <form method="POST"  id="edit_employee" action="">
                @csrf
                @method('PATCH')
                <div class="d-flex flex-column">
                        <h3 class="text-white text-center">Edit:</h3>
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <label class="d-none for="employee_first-name">First Name:</label>
                        <input
                            type="text"
                            id="editEmployee-first_name"
                            name="first_name"
                            placeholder="First Name"
                        >
                    </div>
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <label class="d-none" for="employee_last-name">Last Name</label>
                        <input
                            type="text"
                            id="editEmployee-last_name"
                            name="last_name"
                            placeholder="Last Name"
                        >
                    </div>
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <label class="d-none" for="employee_company">Company</label>
                        <input
                            type="text"
                            value="{{$company->company_name}}"
                            disabled

                        >
                    </div>
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <label class="d-none" for="employee_company">Email</label>
                        <input
                            type="email"
                            id="editEmployee-email"
                            name="email"
                            placeholder="Email"

                        >
                    </div>
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <label class="d-none" for="employee_company">Phone</label>
                        <input
                            type="text"
                            id="editEmployee-phone"
                            name="phone"
                            placeholder="Phone"

                        >
                    </div>
                    <div class="col-md-12 d-flex flex-column mb-3">
                        <button class="btn btn-primary btn-employee p-2" type="submit">Add</button>
                    </div>
                </div>
            </form>
            <button class="btn btn-danger edit-form w-100">Back</button>
        </div>
        <div class="edit-hidden"></div>
    </div>
@endsection
