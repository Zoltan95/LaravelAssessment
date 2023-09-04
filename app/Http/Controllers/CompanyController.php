<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function create_new()
    {
        $attributes = request()->validate([
            'company_name'=>['required', Rule::unique('companies', 'company_name')],
            'company_email'=>'required',
            'company_logo'=>'required|image',
            'company_website'=>'required',
        ]);

        $attributes['company_logo'] = request()->file('company_logo')->store('logos');
        \App\Models\Company::create($attributes);

        return redirect('/');
    }

    public function add_employee(Company $company)
    {
        $attributes = request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);

        $company->employees()->create($attributes);

        return back();
    }

    public function update(Company $company)
    {
        $attributes = request()->validate([
            'company_name'=>['required', Rule::unique('companies', 'company_name')->ignore($company->id)],
            'company_email'=>'required',
            'company_logo'=>'image',
            'company_website'=>'required',
        ]);

        if (isset($attributes['company_logo'])) {
            $attributes['company_logo'] = request()->file('company_logo')->store('logos');
        }

        $company->update($attributes);

        return redirect('/');
    }

    public function update_employee(Employee $employee)
    {
        $attributes = request()->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'phone'=>'required',
            'email'=>'required',
        ]);


        $employee->update($attributes);

        return back();
    }

    public function remove(Company $company)
    {
        $company->delete();

        return back();
    }

    public function remove_employee(Employee $employee)
    {
        $employee->delete();

        return back();
    }
}
