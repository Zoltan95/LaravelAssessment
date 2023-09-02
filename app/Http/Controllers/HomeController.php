<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
    public function index()
    {
        if (auth()->user()->is_admin === 1){
            return view('admin');
        }
        return view('home');
    }

    public function create()
    {
        return view('auth.manage.create');
    }

    public function manage()
    {
        return view('auth.manage.manage');
    }

    public function store()
    {
        $record = new Company();

        \request()->validate([
            'company_name'=>['required', Rule::unique('companies', 'company_name')],
            'company_email'=>'required',
            'company_website'=>'required',
        ]);

        $record->company_name = \request('company_name');
        $record->email=\request('company_name');
        $record->website=\request('company_name');
        $record->logo= "asdasdasd";

        $record->save();

        return redirect('/');
    }
}
