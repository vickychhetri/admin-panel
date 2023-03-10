<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProspectController;
use App\Http\Controllers\DashboardController;

// use App\Http\Controllers\SampleController;

/*
|--------------------------------- -----------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'login'])->name('new_login');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// ___________________________ Admin Route ____________________________
Route::group(['middleware' => ['auth', 'is_Admin']], function () {
    // manage-employees
    Route::get('manage-employees', [UserController::class, 'index']);
    Route::get('/delete-employee/{id}', [UserController::class, 'delete_employee']);
    Route::get('/add-employee', [UserController::class, 'add_employee']);
    Route::get('/edit-employee/{id}', [UserController::class, 'edit_employee']);
    Route::put('/insert-employee', [UserController::class, 'insert_employee']);

    Route::group(['namespace' => 'App\Http\Controllers'], function () {
    Route::get('/delete-sample/{id}', 'SampleController@destroy');
    Route::get('sample-list-delete/{id}', 'SamplelistController@destroy');
    Route::post('api/fetch-sample', 'OrderController@fetchSampleName');
    Route::get('sample-approve/{id}', 'OrderController@sampleApprove')->name('sample.approve');
    Route::get('sample-unapprove/{id}', 'OrderController@sampleUnApprove')->name('sample.unpprove');
        Route::resource('sample', SampleController::class)->except('destroy');
        Route::resource('order', OrderController::class)->except('destroy');
        Route::resource('sample-list', SampleListController::class)->except('destroy');

    });
});


// ___________________________ Admin & User Route ____________________________
Route::group(['middleware' => ['auth', 'is_User']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
