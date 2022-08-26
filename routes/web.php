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
Route::get('beranda', 'BerandaController@index')->name('beranda.index');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){
	Route::get('beranda', 'BerandaController@index')->name('beranda.index');
	Route::get('home', 'HomeController@index');
	
	//kelola pemilih
	Route::get('pemilih', 'PemilihController@index');
	Route::get('pemilih/add', 'PemilihController@add');
	Route::post('pemilih/add', 'PemilihController@store');
	Route::get('pemilih/{id}','PemilihController@edit');
	Route::put('pemilih/{id}', 'PemilihController@update');
	Route::delete('pemilih/{id}', 'PemilihController@delete');
	
	//kelola kandidat
	Route::get('kandidat','KandidatController@index');
	Route::get('kandidat/detail/{id}','KandidatController@show');
	Route::get('kandidat/add','KandidatController@add');
	Route::post('kandidat/add','KandidatController@store');
	Route::get('kandidat/{id}','KandidatController@edit');
	Route::put('kandidat/{id}', 'KandidatController@update');
	Route::delete('kandidat/{id}', 'KandidatController@delete');

	//list kandidat di dashboard non admin
	Route::get('pemilihan','PemilihanController@index');
	Route::get('pemilihan/get-visi/{id}','PemilihanController@get_visi');
	Route::get('pemilihan/vote/{id}','PemilihanController@voting');
	
	//periode voting
	Route::get('periode','PeriodeController@index');
	Route::post('periode','PeriodeController@set_periode');
	
	//ubah password user
	Route::get('ubah-password','BerandaController@change_password');
	Route::post('ubah-password','BerandaController@store');

});
	Route::group(['middleware' => ['auth','checkRole:admin,non']], function(){
	Route::get('beranda', 'BerandaController@index')->name('beranda.index');
	Route::get('home', 'HomeController@index');
	
	//list kandidat di dashboard non admin
	Route::get('pemilihan','PemilihanController@index');
	Route::get('pemilihan/get-visi/{id}','PemilihanController@get_visi');
	Route::get('pemilihan/vote/{id}','PemilihanController@voting');
	
	//ubah password user
	Route::get('ubah-password','BerandaController@change_password');
	Route::post('ubah-password','BerandaController@store');
	});
Route::get('keluar', function(){
	\Auth::logout();
	return redirect('login');
});


Auth::routes([
	'register'=> false]);
	