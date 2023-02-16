<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    // setup code
    if (!Schema::hasTable('users') || (!User::where('name', '=', 'Admin')->exists())) {
        // Code to create table
        Session::flush();
        Auth::logout();

        // create symlink
        Artisan::call('storage:link');

        // Delete old company images
        array_map('unlink', glob(storage_path('app/public/company/logos/*')));

        Artisan::call('migrate:fresh --seed --force');
    }

    return view('home', ['companyCount' => Company::count(), 'employeeCount' => Employee::count()]);
});



Route::group(['scheme' => 'https'], function () {
    Route::get('login',  [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login',  [LoginController::class, 'login']);
    Route::get('logout',  [LoginController::class, 'logout']);
    Route::post('logout',  [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('company/search', [CompanyController::class, 'search']);
    Route::resource('company', CompanyController::class);
    Route::get('employee/search', [EmployeeController::class, 'search']);
    Route::resource('employee', EmployeeController::class);
});


Route::get('/home', [HomeController::class, 'index'])->name('home');


