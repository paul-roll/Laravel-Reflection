<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
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
    if (!Schema::hasTable('users')) {
        Artisan::call('migrate:fresh --seed');
    }
    return view('welcome');
});

// Auth::routes();
// Auth::routes(['register' => false]);
Route::get('login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',  [LoginController::class, 'login']);
Route::post('logout',  [LoginController::class, 'logout'])->name('logout');

Route::resource('company', CompanyController::class);

Route::get('employee', [EmployeeController::class, 'index']);
Route::get('employee/{id}', [EmployeeController::class, 'show']);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/migrate', function () {
    // Session::flush();
    // Auth::logout();
    Artisan::call('migrate:fresh --seed --force');
    // return redirect ('login');
    return redirect('/');
// })->middleware('auth');
});
