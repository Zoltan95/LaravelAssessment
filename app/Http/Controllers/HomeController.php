<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
