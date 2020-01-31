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

use App\Image;
use App\User;
use App\Company;
use Illuminate\Support\Facades\Route;



Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/configuracion', 'UserController@config')->name('config');
Route::post('/user/update', 'UserController@update')->name('user.update');
Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
Route::get('/subir-noticia', 'NoticiaController@create')->name('noticia.create');
Route::post('/noticia/save', 'NoticiaController@save')->name('noticia.save');
Route::get('/noticia/file/{filename}', 'NoticiaController@getNoticia')->name('noticia.file');
Route::get('/noticias/{id}', 'NoticiaController@detail')->name('noticia.detail');
Route::post('/comment/save', 'CommentController@save')->name('comment.save');
Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');



