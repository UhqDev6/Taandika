<?php

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

Route::get('/', 'DashboardController@index')->name('dashboard');
Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('alternatif','AlternatifController');
Route::resource('kriteria', 'KriteriaController');
Route::resource('sub','SubController');
Route::resource('relasi','RelasiController');
Route::resource('perhitungan', 'HitungController');