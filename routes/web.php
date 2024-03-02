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

    Route::resource('/users', BackendController::class);
    Route::get('/users/{user}/delete', 'destroy');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
});

Route::controller(BannerController::class)->group(function () {
    Route::get('/banner', 'banner')->name('banner');
    Route::post('/banner', 'store_banner')->name('store_banner');
    Route::get('/banner/{banner}/delete', 'store_banner_delete')->name('store_banner_delete');
});

Route::controller(CashCounterController::class)->group(function () {
    Route::get('get_report_by_party', 'get_report_by_party');
});
Route::get('migrate', function () {
    Artisan::call('migrate');
});
Route::get('reset', function () {
    Artisan::call('migrate:reset');
});
Route::get('refresh', function () {
    Artisan::call('migrate:refresh');
});
Route::get('cc', function () {
    Artisan::call("migrate --path='./database/migrations/2023_03_18_154834_create_cash_counters_table.php'");
});
