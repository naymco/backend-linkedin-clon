<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PruebaController;

Route::group(['middleware' => ['cors']], function () {
  //Registro, Login, Logout, Perfil, Modificar Perfil, Solicitar Oferta
  // Route::group(['middleware'=>['UserToken']], function (){


  //Empleos
  Route::post('/solicitaroferta', 'SolicitarOfertaController@solicitarOferta');
  Route::get('/versolicitudes/{id}', 'VerSolicitudesController@VerSolicitudesUsuario');
  Route::post('/rechazarsolicitud', 'AdminUserRequest@AdministrarSolicitud');
  //Modificar perfil
  Route::patch('/modificarperfil', 'ModificarPerfilUsuarioController@CambiarPerfilUsuario');
  Route::get('/verperfil/{id}', 'VerPerfilController@verPerfilUsuario');
  Route::post('/eliminar', 'DeleteUserRequestController@deleteRequest');

  //Curriculum
    Route::post('/curriculum', 'CurriculumController@CreateCV');

    // });
  //Se crea un usuario y se logea
  Route::post('/register', 'Auth\UserRegisterController@create');
  Route::post('/login', 'Auth\UserLoginController@loginUser');
  //Se deslogea un usuario
  Route::post('/logout', 'Auth\UserLogoutController@logout');
});
