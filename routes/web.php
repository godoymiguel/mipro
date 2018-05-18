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


Route::post('/idea', 'IdeaController@store')->name('idea.store');
Route::get('/idea', 'IdeaController@create')->name('idea');

Route::get('/idea/{id}/edit', 'IdeaController@edit')->name('idea.edit');
Route::put('/idea/{id}', 'IdeaController@update')->name('idea.update');
Route::delete('/idea/{id}', 'IdeaController@delete')->name('idea.delete');
Route::get('/idea/tabla', 'IdeaController@index')->name('idea.tabla');



Route::resource('rol','RolController');
Route::put('rol/{rol}/a','RolController@active')->name('rol.active');

Route::resource('usuario', 'UserController');
Route::put('usuario/{usuario}/a','UserController@active')->name('user.active');

Route::resource('proyectos','ProjectController');
Route::put('proyectos/{proyectos}/a','ProjectController@active')->name('proyectos.active');