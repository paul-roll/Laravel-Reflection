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
    return view('home');
});

// Auth::routes();
// Auth::routes(['register' => false]);
Route::get('login',  [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',  [LoginController::class, 'login']);
Route::post('logout',  [LoginController::class, 'logout'])->name('logout');

Route::resource('company', CompanyController::class);
Route::resource('employee', EmployeeController::class);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/reset', function () {

    // // logout
    Session::flush();
    Auth::logout();

    // delete symlink
    // had problems with it on cPanel
    // if (file_exists(public_path('storage'))) {
    //     rmdir(public_path('storage'));
    // }

    // create symlink
    Artisan::call('storage:link');

    // clean out old company images
    array_map('unlink', glob(storage_path('app/public/company/logos/*')));

    Artisan::call('migrate:fresh --seed --force');

    // return redirect ('login');
    return redirect('/');
    // })->middleware('admin');
});
