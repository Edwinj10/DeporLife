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
// Admin
Route::get('/','FrontController@index');
Route::get('panel','FrontController@admin');
Route::resource('portadas', 'PortadaController');
Route::resource('publicaciones', 'PublicacionesController');
Route::get('/listall/{categoria}/{slug}/{page?}', 'ComentariosController@listall');
Route::get('noticias/{categoria}/{slug}', 'PublicacionesController@mostrar');
Route::resource('usuarios', 'UsuarioController');
Route::resource('comentarios', 'ComentariosController');
Route::get('/listallcategoria/{page?}', 'CategoriaController@listcategorias'); 
Route::resource('categoria', 'CategoriaController');
Route::get('/listall/{page?}', 'EtiquetaController@listall'); 
Route::get('/listtags/{page?}', 'EtiquetaController@listtags');
Route::resource('/etiquetas', 'EtiquetaController');


// Web
Route::get('futbol','FrontController@futbol');
Route::get('futbolnacional','FrontController@futbol_nacional');
Route::get('futbolinternacional','FrontController@futbol_internacional');
Route::get('busqueda','FrontController@busqueda');
Route::get('galeria', 'FrontController@galeria');
Route::get('form_nuevo_usuario', 'FormulariosController@form_nuevo_usuario');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('fotos', 'ImagenesController');
Route::resource('ajustes', 'AjustesController');
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('auth.facebook');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');
// Route::get('/{slug?}', 'FrontController@index');