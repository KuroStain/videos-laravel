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

//Ruta para pagina de reproduccion de video
Route::get('/video/{video_id}', array(
	'as' 	=> 'videoDetail',
	'uses' 	=> 'VideoController@getVideoDetail'
));

//Ruta obtener videos
Route::get('/video-file/{filename}', array(
	'as'	=>'fileVideo',
	'uses'	=>'VideoController@getVideo'
));

//Ruta guardar comentarios
Route::post('/comment', array(
	'as' 			=>'saveComment',
	'middleware' 	=> 'auth',
	'uses' 			=> 'CommentController@store'
));

//Ruta eliminar comentarios
Route::get('/delete-comment/{comment_id}', array(
	'as' 			=>'deleteComment',
	'middleware' 	=> 'auth',
	'uses' 			=> 'CommentController@delete'
));

//Ruta eliminar videos
Route::get('/delete-video/{video_id}', array(
	'as' 			=>'deleteVideo',
	'middleware' 	=> 'auth',
	'uses' 			=> 'VideoController@delete'
));