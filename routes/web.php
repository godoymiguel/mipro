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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//GESTION DE USUARIOS
Route::resource('rol','RolController');
Route::put('rol/{rol}/a','RolController@active')->name('rol.active');

Route::resource('usuario', 'UserController');
Route::put('usuario/{usuario}/a','UserController@active')->name('user.active');

Route::resource('proyectos','ProjectController')->parameters(['proyectos' => 'project']);
Route::put('proyectos/{project}/a','ProjectController@active')->name('proyectos.active');

//ESTUDIO DE MERCADO
Route::resource('promotor','PromoterController')->parameters(['promotor' => 'promoter']);
Route::resource('serietemporal','TimeSerieController')->parameters(['serietemporal'=>'timeSerie']);
Route::get('import', 'TimeSerieController@csv')->name('import.csv');
Route::post('import', 'TimeSerieController@import')->name('import');
Route::resource('regresion','RegressionController')->parameters(['regresion'=>'regression']);
Route::resource('proyeccion','ProjectionController')->parameters(['proyeccion'=>'projection']);

//ESTUDIO TECNICO
