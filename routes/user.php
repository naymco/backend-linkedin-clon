<?php
use Illuminate\Http\Request;
use App\Http\Controllers\PruebaController;

Route::group(['middleware'=>['cors']], function (){
  //Registro, Login, Logout, Perfil, Modificar Perfil, Solicitar Oferta

    //Se crea un usuario
    Route::post('/register', 'Auth\UserRegisterController@create');
    //Se logea un usuario
    Route::post('/login', 'Auth\UserLoginController@loginUsuario');

});
