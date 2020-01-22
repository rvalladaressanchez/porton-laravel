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

Route::get('/', function () {
    return redirect('/index');
});
/*Route::get('/login', function () {
    return view('login');
});
Route::post('/login', "Controller@login");*/
Route::get('/index', "Controller@index");
//Route::post('/logout', "Controller@logout");

//Usuario//
Route::get('/usuarios','ControladorUsuario@index');
Route::get('/usuarios/{id}/edit','ControladorUsuario@edit')->where('id', '[0-9]+');
Route::get('/usuarios/nuevo','ControladorUsuario@create');
Route::post('/usuarios/{id}/edit','ControladorUsuario@update')->where('id', '[0-9]+');
Route::post('/usuarios/{id}/destroy','ControladorUsuario@destroy');
Route::post('/usuarios/store','ControladorUsuario@store');

//Registros//
Route::get('/registros','ControladorRegistro@index');
Route::get('/registros/{id}','ControladorRegistro@show')->where('id', '[0-9]+');
Route::get('/registros/grafico','ControladorRegistro@grafico');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
