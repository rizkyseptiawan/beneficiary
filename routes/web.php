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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::group(['as' => 'beneficiary.','prefix' => 'penerima-bantuan'], function () {
        Route::get('/daftar', 'BeneficiaryController@index')->name('index')->middleware('role:admin');
        Route::get('/tambah', 'BeneficiaryController@create')->name('create')->middleware('role:admin');
        Route::get('{id}/detail', 'BeneficiaryController@show')->name('show')->middleware('role:admin');
        Route::get('{id}/edit', 'BeneficiaryController@edit')->name('edit')->middleware('role:admin');
        Route::get('/biodata-saya', 'BeneficiaryController@beneficiary')->name('profile');
        Route::post('/tambah', 'BeneficiaryController@store')->name('store')->middleware('role:admin');
        Route::patch('{id}/update', 'BeneficiaryController@update')->name('update')->middleware('role:admin');
        Route::delete('{id}/hapus', 'BeneficiaryController@destroy')->name('delete')->middleware('role:admin');
    });
    Route::group(['as' => 'periode.','prefix' => 'periode-bantuan'], function () {
        Route::get('/daftar', 'AidPeriodController@index')->name('index')->middleware('role:admin');
        Route::get('/tambah', 'AidPeriodController@create')->name('create')->middleware('role:admin');
        Route::get('{id}/edit', 'AidPeriodController@edit')->name('edit')->middleware('role:admin');
        Route::get('{id}/detail', 'AidPeriodController@show')->name('show')->middleware('role:admin');
        Route::post('/tambah', 'AidPeriodController@store')->name('store')->middleware('role:admin');
        Route::patch('{id}/update', 'AidPeriodController@update')->name('update')->middleware('role:admin');
        Route::delete('{id}/hapus', 'AidPeriodController@destroy')->name('delete')->middleware('role:admin');
    });
    Route::group(['as' => 'criteria.','prefix' => 'kriteria'], function () {
        Route::get('/daftar', 'CriteriaController@index')->name('index')->middleware('role:admin');
        Route::get('/tambah', 'CriteriaController@create')->name('create')->middleware('role:admin');
        Route::get('{id}/edit', 'CriteriaController@edit')->name('edit')->middleware('role:admin');
        Route::patch('{id}/update', 'CriteriaController@update')->name('update')->middleware('role:admin');
        Route::post('/tambah', 'CriteriaController@store')->name('store')->middleware('role:admin');
        Route::delete('{id}/hapus', 'CriteriaController@destroy')->name('delete')->middleware('role:admin');
    });
    Route::group(['as' => 'subcriteria.','prefix' => 'subkriteria'], function () {
        Route::get('/daftar', 'SubCriteriaController@index')->name('index')->middleware('role:admin');
        Route::get('/tambah', 'SubCriteriaController@create')->name('create')->middleware('role:admin');
        Route::get('{id}/edit', 'SubCriteriaController@edit')->name('edit')->middleware('role:admin');
        Route::patch('{id}/update', 'SubCriteriaController@update')->name('update')->middleware('role:admin');
        Route::post('/tambah', 'SubCriteriaController@store')->name('store')->middleware('role:admin');
        Route::delete('{id}/hapus', 'SubCriteriaController@destroy')->name('delete')->middleware('role:admin');
    });
    Route::group(['as' => 'history.','prefix' => 'pengajuan'], function () {
        Route::get('/riwayat', 'FinancialSubmissionController@index')->name('index');
        Route::get('/ajukan', 'FinancialSubmissionController@create')->name('create');
        Route::post('/ajukan', 'FinancialSubmissionController@store')->name('store');
        Route::get('/seleksi', 'FinancialSubmissionController@calculateRequest')->name('calculate')->middleware('role:admin');
        Route::post('/seleksi', 'FinancialSubmissionController@calculateStore')->name('calculate')->middleware('role:admin');
        Route::delete('{id}/hapus', 'FinancialSubmissionController@destroy')->name('delete')->middleware('role:admin');
        Route::PATCH('{id}/terima', 'FinancialSubmissionController@accept')->name('accept')->middleware('role:admin');
        Route::PATCH('{id}/tolak', 'FinancialSubmissionController@decline')->name('decline')->middleware('role:admin');
    });
    
});

