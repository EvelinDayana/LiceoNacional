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




Route::get('/registrarse', 'UserController@create');
Route::post('/registrarse', 'UserController@createUser');


Route::get('/', 'UserController@login');
Route::post('/iniciar', 'UserController@signin');

Route::post('/actualizar' , 'UserController@update');
Route::post('/actualizarContraseña' , 'UserController@update_password');

Route::get('/salir' , 'UserController@signout');

Route::get('/perfil/{iduser}' , 'UserController@goProfile');


Route::post('/publicar' , 'PostController@create');
Route::get('/eliminarpublicacion/{idpost}' , 'PostController@delete');

Route::get('/comentar' , 'CommentController@createComment');
Route::get('/eliminarcomentario/{idcomment}' , 'CommentController@deleteComment');

Route::get('/likepublicacion/{idpostlike}' , 'LikeController@createLike');
Route::get('/eliminarlike/{idpostlike}' , 'LikeController@deleteLike');

Route::get('/createFriendship/{iduserfollowed}','FollowController@createFriendship');

Route::get('/deleteFriendship/{iduserfollowed}','FollowController@deleteFriendship');

Route::post('foto' , 'UserController@updatePhoto');

Route::get('/' , 'DashboardController@dashboard');

Route::get('/amigos/{iduser}' , 'FollowController@listFriendship');

Route::get('/seguidores/{iduser}', 'FollowController@follower');


Route::get('/seguidos/{iduser}', 'FollowController@followed');

Route::get('/viewProfile/{iduser}', 'ProfileController@profile');

Route::get('/viewListFriends/{iduser}', 'ProfileController@friends');

Route::get('/viewInformation/{iduser}' , 'ProfileController@information');

Route::get('/viewListEvents/{iduser}' , 'ProfileController@events');

Route::GET('/crearEventos' , 'EventController@showEvent');
Route::get('/shortEvent' , 'EventController@createShortEvent');
Route::get('/largeEvent' , 'EventController@createLargeEvent');

Route::post('/crearEventoLargo' , 'EventController@create_large_event');
Route::post('/crearEventoCorto' , 'EventController@create_short_event');

Route::get('/departament/{id_departament}' , 'DepartamentController@show');

Route::post('/actualizar_informacion_academica' , 'UserController@update_academic_information');

Route::post('/actualizar_datos_personales' , 'UserController@update_data');

Route::post('/actualizar_localidad' , 'UserController@update_location');

Route::post('/actualizar_trabajo' , 'UserController@update_record');

Route::get('/privacy/{iduser}' , 'ProfileController@privacy');