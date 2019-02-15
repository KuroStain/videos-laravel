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

//Ruta del controlador de crear video
Route::get('/crear-video', array(
	'as' 			=>'createVideo',
	'middleware' 	=> 'auth',
	'uses' 			=> 'VideoController@createVideo'
));

//Ruta para guardar video
Route::post('/guardar-video', array(
	'as' 			=>'saveVideo',
	'middleware' 	=> 'auth',
	'uses' 			=> 'VideoController@saveVideo'
));

//Ruta para obtener las miniaturas de los videos
Route::get('/miniatura/{filename}', array(
	'as' 	=> 'imageVideo',
	'uses' 	=> 'VideoController@getImage' 
));