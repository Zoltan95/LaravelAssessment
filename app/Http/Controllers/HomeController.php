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
}
