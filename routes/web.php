<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('companies',[
      'companies' => \App\Models\Company::all()
    ]);
});

Route::get('/companies/{company}', function(\App\Models\Company $company) {
    return view('company', [
       'company'=>$company,
        'employees'=> $company->employees,
    ]);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('admin/create-company', [App\Http\Controllers\HomeController::class, 'create'])->middleware('admin');
Route::get('admin/manage-company', [App\Http\Controllers\HomeController::class, 'manage'])->middleware('admin');
Route::get('admin/manage-company/{company}', [App\Http\Controllers\HomeController::class, 'edit'])->middleware('admin');
Route::patch('admin/manage-company/edit/{company}', [App\Http\Controllers\CompanyController::class, 'update'])->middleware('admin');
Route::post('/admin/create-new', [App\Http\Controllers\CompanyController::class, 'create_new'])->middleware('admin');
