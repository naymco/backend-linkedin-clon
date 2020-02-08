<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/company/login', 'PassportController@login');
Route::post('/company/register', 'PassportController@register');
Route::post('/user/login', 'PassportController@login');
Route::post('/user/register', 'PassportController@register');
Route::get('/prueba ', 'HomeController@index');


Route::group(['middleware' => ['cors']], function () {
    //Saca las ofertas que esten anunciado
    Route::get('/anuncio', 'OfferWorksController@ofertasAnuncios');
    //Saca ofertas por skills
    Route::get('/ordenadas', 'OfertasPopularidadController@ofertasOrdenadas');
    //Saca todas las ciudades
    Route::get('/ciudades', 'OfertasCiudadesController@ofertasCiudades');
    //Saca las ofertas de la ciudad por parametro
    Route::get('/ciudad/{nombreciudad}', 'OfertasCiudadesController@ofertasCiudad');
    //Saca las ofertas de los sectores de trabajo por parametro
    Route::get('/sector/{sector}', 'OfertasSectorController@ofertasSector');

    //Like y Dislike
    Route::get('/like/{image_id}', 'LikeController@like');
    Route::get('/dislike/{image_id}', 'LikeController@like');

    //Timeline
    Route::post('/crearpost', 'CreatePostController@CreatePost');
    Route::get('/post', 'ViewPostController@postPublicados');
    Route::post('/img/uploadImg', 'CreatePostController@uploadfile');
});

/*Route::middleware('auth:api')->group(function () {
    Route::get('user', 'PassportController@details');
    Route::get('company', 'PassportController@companyDetails');
   // Route::get('/', 'HomeController@index')->name('home');

    Route::get('/configuracion', 'UserController@config')->name('config');
    Route::post('/user/update', 'UserController@update')->name('user.update');
    Route::get('/user/avatar/{filename}', 'UserController@getImage')->name('user.avatar');
    Route::get('/subir-noticia', 'NoticiaController@create')->name('noticia.create');
    Route::post('/noticia/save', 'NoticiaController@save')->name('noticia.save');
    Route::get('/noticia/file/{filename}', 'NoticiaController@getNoticia')->name('noticia.file');
    Route::get('/noticias/{id}', 'NoticiaController@detail')->name('noticia.detail');
    Route::post('/comment/save', 'CommentController@save')->name('comment.save');
    Route::get('/comment/delete/{id}', 'CommentController@delete')->name('comment.delete');
    Route::get('/like/{image_id}', 'LikeController@like')->name('like.save');*/



/*});*/
