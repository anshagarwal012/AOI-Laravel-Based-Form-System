<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CashCounterController;
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
    return redirect('/login');
});

Route::controller(BackendController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');

    Route::get('/dashboard', 'dashboard');
    Route::get('/diplomate-registration-form', 'diplomate-registration-form');
    Route::get('/fellowship-registration-form', 'fellowship-registration-form');
    Route::get('/membership-form', 'membership-form');
    Route::get('/registration-form', 'registration-form');
});