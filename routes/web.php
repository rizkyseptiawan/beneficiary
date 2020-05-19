<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
Route::group(['as' => 'beneficiary.','prefix' => 'penerima-bantuan'], function () {
    Route::get('/daftar', 'BeneficiaryController@index')->name('index');
    Route::get('/tambah', 'BeneficiaryController@create')->name('create');
    Route::post('/tambah', 'BeneficiaryController@store')->name('store');
});
Route::group(['as' => 'periode.','prefix' => 'periode-bantuan'], function () {
    Route::get('/daftar', 'AidPeriodController@index')->name('index');
    Route::get('/tambah', 'AidPeriodController@create')->name('create');
    Route::post('/tambah', 'AidPeriodController@store')->name('store');
});

