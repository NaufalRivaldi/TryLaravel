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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', 'UserController@homepage');

// Route::get('form', 'FormController@index');
// Route::post('form/post', 'FormController@post');
// Route::get('formval', 'FormController@formval');
// Route::post('formval/post', 'FormController@postval');

// Route::get('get/{id}', function($id){
// 	return $id;
// });

Route::group(['middleware' => ['web']], function(){
	Route::get('/', 'SiswaController@index');
	Route::get('siswa/create', 'SiswaController@create');
	//insert data siswa
	Route::post('siswa', 'SiswaController@store');
	//show siswa
	Route::get('siswa/{siswa}', 'SiswaController@show');
	//edit siswa
	Route::get('siswa/{siswa}/edit', 'SiswaController@edit');
	Route::post('siswa/update/{siswa}', 'SiswaController@update');
	//delete
	Route::get('siswa/{siswa}/delete', 'SiswaController@destroy');
	//collection
	Route::get('tes-collection', 'SiswaController@tesCollection');
});