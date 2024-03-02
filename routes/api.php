<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EntriesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashCounterController;
use App\Http\Controllers\OutdoorPartiesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\BannerController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('forget', 'forget');
    Route::post('forget_verify', 'forget_verify');
    Route::post('register/staff', 'register_staff');
    Route::post('list/staff', 'staff_list');
    Route::post('update/{id}', 'update');
    Route::post('delete/{id}', 'delete');
});

Route::controller(EntriesController::class)->group(function () {
    Route::post('entries/add', 'add_entries');
    Route::post('entries/read/{entries}', 'entries');
    Route::post('entries/search', 'search_entries');
    Route::post('entries/update/{id}', 'update_entries');
    Route::post('entries/recycle/{id}', 'recycle_entries');
    Route::post('entries/delete/{id}', 'delete_entries');
    Route::post('entries/list/{id}', 'get_entries_by_id');
    Route::post('entries/id/{id}', 'get_entries_by_entry_id');
});

Route::controller(CashCounterController::class)->group(function () {
    // Route::get('user', 'list_user');
    // Route::post('user', 'add_user');
    Route::post('entry/update/{id}', 'update_entries');
    Route::post('entry/delete/{id}', 'delete_entries');
    Route::post('entry', 'add_entry');
    Route::post('entry/{id}', 'get_entry');
    Route::post('entry/single/{id}', 'get_single_date_entry');
    Route::post('entry/commision/{id}', 'get_entry_commision');
    Route::post('entry/commision/single/{id}', 'get_single_date_entry_commision');
    Route::post('get_report_by_party', 'get_report_by_party');
    Route::post('get_report', 'get_report');
    Route::post('get_report_by_entry', 'get_report_by_entry');
});

Route::controller(OutdoorPartiesController::class)->group(function () {
    Route::get('outdoor_parties', 'list_user');
    Route::get('outdoor_parties/{id}', 'list_user_by_id');
    Route::post('outdoor_parties', 'add_user');
    // Route::post('entry', 'add_entry');
});

Route::controller(TransactionController::class)->group(function () {
    Route::post('add_transaction', 'add_transaction');
    Route::post('get_transaction', 'get_transaction');
    Route::post('get_current_status', 'get_current_status');
});

Route::controller(BannerController::class)->group(function () {
    Route::post('all_banner', 'all_banner');
});
