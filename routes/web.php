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


Route::get('/login','AuthController@login')->name('login');

Route::post('/postlogin','AuthController@postlogin');

Route::get('/logout','AuthController@logout');


Route::group(['middleware' => ['auth','checkRole:admin']], function(){

	Route::get('/buku','BukuController@index');

	Route::post('/buku/create','BukuController@create');

	Route::get('/buku/{id}/edit','BukuController@edit');

	Route::post('/buku/{id}/update','BukuController@update');

	Route::get('/buku/{id}/delete','BukuController@delete');

	Route::get('/buku/{id}/detail','BukuController@detail');

	Route::get('/anggota','AnggotaController@index');

	Route::post('/anggota/create','anggotaController@create');

	Route::get('/anggota/{id}/edit','AnggotaController@edit');

	Route::post('/anggota/{id}/update','AnggotaController@update');

	Route::get('/anggota/{id}/delete','AnggotaController@delete');

	Route::get('/anggota/{id}/detail','AnggotaController@detail');


});

Route::group(['middleware' => ['auth','checkRole:admin,user']], function(){
	Route::get('/','DashboardController@index');

	Route::get('/dashboard','DashboardController@index');

	Route::resource('transaksi', 'TransaksiController');	

	Route::get('/laporan/buku', 'laporanController@buku');

	Route::get('/laporan/buku/excel', 'laporanController@bukuExcel');

	Route::get('/laporan/buku/pdf', 'laporanController@bukuPdf');

	Route::get('/laporan/transaksi', 'laporanController@transaksi');

	Route::get('/laporan/transaksi/excel', 'laporanController@transaksiExcel');

	Route::get('/laporan/transaksi/pdf', 'laporanController@transaksiPdf');

	Route::get('/anggota/profile','AnggotaController@setting');

	Route::post('/anggota/{id}/ubah','AnggotaController@ubah');

});

