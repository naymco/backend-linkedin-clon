<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DatosController;
Route::group(['middleware'=>['cors']], function (){
    //Route::group(['middleware'=>['CompanyToken']], function (){

    //ver perfil de la empresa y modificar
    Route::get('/verperfil/{id}', 'VerPerfilController@verPerfilEmpresa');
    Route::post('/crearoferta', 'CreateOfferController@CreateOffer');
    Route::get('/versolicitudes/{id}', 'VerSolicitudesController@VerSolicitudesEmpresas');
    Route::post('/cambiarsolicitud', 'AdminCompanyRequestController@AdministrarSolicitud');
    Route::post('/modificarperfil', 'ModificarPerfilEmpresaController@CambiarPerfilEmpresa');
    Route::post('/borrarsolicitud', 'EliminarSolicitudEmpresa Controller@borrarSolicitud');
    Route::post('/borrarofertatrabajo', 'EliminarOfertaTrabajoEmpresaController@borrarOfertaTrabajo');
   // });
   // Registro,Login y logout de empresa
    Route::post('/login', 'Auth\CompanyLoginController@loginCompany');
    Route::post('/logout', 'Auth\CompanyLogoutController@logout');
    Route::post('/register', 'Auth\CompanyRegisterController@create');
});
