<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard or admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function create()
    {
        return view('auth.manage.create');
    }

    public function manage()
    {

        if (request('search')) {
            $companies = \App\Models\Company::where('company_name', 'like', '%' . request('search') . '%');
            return view('auth.manage.manage',[
                'companies' => $companies->paginate(10),
            ]);
        }else {
            $companies = \App\Models\Company::paginate(10);
            return view('auth.manage.manage', [
                'companies' => $companies
            ]);
        }
    }

    public function edit(Company $company)
    {
        //dd($company->employees('items')->paginate());
        return view('auth.manage.edit', [
            'company'=> $company,
            'employees'=> $company->employees()->paginate(10),
        ]);
    }
}
