<?php
use Illuminate\Http\Request;
use App\Http\Controllers\PruebaController;

Route::group(['middleware'=>['cors']], function (){
  //Registro, Login, Logout, Perfil, Modificar Perfil, Solicitar Oferta
    Route::group(['middleware'=>['UserToken']], function (){

    //Se deslogea un usuario
    Route::post('/logout', 'Auth\UserLogoutController@logout');

    //Modificar perfil
    Route::post('/modificarperfil', 'ModificarPerfilUsuarioController@CambiarPerfilUsuario');
    Route::get('/verperfil/{id}', 'VerPerfilController@verPerfilUsuario');
    });
//Se crea un usuario y se logea
        Route::post('/register', 'Auth\UserRegisterController@create');
        Route::post('/login', 'Auth\UserLoginController@loginUser');
});
