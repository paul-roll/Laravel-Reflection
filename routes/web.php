<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

// Auth::routes();
Route::get('login',  [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login',  [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout',  [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/migrate', function() {
    Artisan::call('migrate:fresh --seed');
    return view('welcome');
});
