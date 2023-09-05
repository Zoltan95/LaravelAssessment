<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        if (!empty(auth()->user()->is_admin)){
            if (auth()->user()->is_admin === 1) {return view('admin');}
        }
        if (request('search')) {
            $companies = \App\Models\Company::where('company_name', 'like', '%' . request('search') . '%');
            return view('companies', [
                'companies' => $companies->paginate(10),
            ]);
        } else {
            $companies = \App\Models\Company::paginate(10);
            return view('companies', [
                'companies' => $companies,
            ]);
        }

    }
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

        $m = \App\Models\Company::where('company_name', request('company_name'))->first();

        session()->flash('success', 'Your have successfully Created: ' . $m->company_name);

        return redirect('/admin/manage-company/'.$m->id);
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
        session()->flash('success', 'Your have added a new Employee');

        return back();
    }

    public function update(Company $company)
    {
        $attributes = request()->validate([
            'company_name'=>'required|unique:companies,company_name,'.$company->id,
            'company_email'=>'required|unique:companies,company_email,'.$company->id,
            'company_logo'=>'image',
            'company_website'=>'required|unique:companies,company_website,'.$company->id,
        ]);

        if (isset($attributes['company_logo'])) {
            $attributes['company_logo'] = request()->file('company_logo')->store('logos');
        }

            $m = \App\Models\Company::where('company_name', request('company_name'))->first();
            $company->update($attributes);

            session()->flash('success', 'Your have successfully Edited: ' . $company->company_name);


            return redirect('/admin/manage-company/' . $company->id);

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
        session()->flash('success', 'Your have updated Employee: ' . request()->first_name);
        return back();
    }

    public function remove(Company $company)
    {
        session()->flash('danger', 'Your have removed: ' . $company->company_name);
        $company->delete();
        return redirect('/admin/manage-company');
    }

    public function remove_employee(Employee $employee)
    {
        session()->flash('danger', 'Your have removed: ' . $employee->first_name . " " . $employee->last_name);
        $employee->delete();

        return back();
    }
}
