<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\FrontendController;

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

Route::get('/admin', function () {
    return redirect('/login');
});

Route::controller(BackendController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::get('/logout', 'logout')->name('logout');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', 'dashboard');
        Route::get('/diplomate-registration-form', 'diplomate_registration_form');
        Route::get('/fellowship-registration-form', 'fellowship_registration_form');
        Route::get('/membership-form', 'membership_form');
        Route::get('/registration-form', 'registration_form');
    });
});

Route::controller(FrontendController::class)->group(function () {
    Route::get('/', function(){
        return redirect('/registration-form');
    });
    Route::get('/diplomate-registration-form', 'diplomate_registration_form');
    Route::get('/fellowship-registration-form', 'fellowship_registration_form');
    Route::get('/membership-form', 'membership_form');
    Route::get('/registration-form', 'registration_form');
    Route::post('/form-sumbit', 'form_submit')->name('form_submit');
    Route::get('/download-form/{id}', 'form_download');
});