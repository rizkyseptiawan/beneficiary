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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::group(['as' => 'beneficiary.','prefix' => 'penerima-bantuan'], function () {
        Route::get('/daftar', 'BeneficiaryController@index')->name('index');
        Route::get('/tambah', 'BeneficiaryController@create')->name('create');
        Route::get('{id}/detail', 'BeneficiaryController@show')->name('show');
        Route::get('{id}/edit', 'BeneficiaryController@edit')->name('edit');
        Route::post('/tambah', 'BeneficiaryController@store')->name('store');
        Route::patch('{id}/update', 'BeneficiaryController@update')->name('update');
        Route::delete('{id}/hapus', 'BeneficiaryController@destroy')->name('delete');
    });
    Route::group(['as' => 'periode.','prefix' => 'periode-bantuan'], function () {
        Route::get('/daftar', 'AidPeriodController@index')->name('index');
        Route::get('/tambah', 'AidPeriodController@create')->name('create');
        Route::get('{id}/edit', 'AidPeriodController@edit')->name('edit');
        Route::get('{id}/detail', 'AidPeriodController@show')->name('show');
        Route::post('/tambah', 'AidPeriodController@store')->name('store');
        Route::patch('{id}/update', 'AidPeriodController@update')->name('update');
        Route::delete('{id}/hapus', 'AidPeriodController@destroy')->name('delete');
    });
    Route::group(['as' => 'criteria.','prefix' => 'kriteria'], function () {
        Route::get('/daftar', 'CriteriaController@index')->name('index');
        Route::get('/tambah', 'CriteriaController@create')->name('create');
        Route::get('{id}/edit', 'CriteriaController@edit')->name('edit');
        Route::patch('{id}/update', 'CriteriaController@update')->name('update');
        Route::post('/tambah', 'CriteriaController@store')->name('store');
        Route::delete('{id}/hapus', 'CriteriaController@destroy')->name('delete');
    });
    Route::group(['as' => 'subcriteria.','prefix' => 'subkriteria'], function () {
        Route::get('/daftar', 'SubCriteriaController@index')->name('index');
        Route::get('/tambah', 'SubCriteriaController@create')->name('create');
        Route::get('{id}/edit', 'SubCriteriaController@edit')->name('edit');
        Route::patch('{id}/update', 'SubCriteriaController@update')->name('update');
        Route::post('/tambah', 'SubCriteriaController@store')->name('store');
        Route::delete('{id}/hapus', 'SubCriteriaController@destroy')->name('delete');
    });
    Route::group(['as' => 'histories.','prefix' => 'pengajuan'], function () {
        Route::get('/riwayat', 'FinancialSubmissionController@index')->name('index');
        // Route::get('/tambah', 'SubCriteriaController@create')->name('create');
        // Route::get('{id}/edit', 'SubCriteriaController@edit')->name('edit');
        // Route::patch('{id}/update', 'SubCriteriaController@update')->name('update');
        // Route::post('/tambah', 'SubCriteriaController@store')->name('store');
        // Route::delete('{id}/hapus', 'SubCriteriaController@destroy')->name('delete');
    });
    
});

