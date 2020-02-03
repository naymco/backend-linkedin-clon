<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DatosController;
Route::group(['middleware'=>['cors']], function (){
    Route::group(['middleware'=>['CompanyToken']], function (){

    Route::post('/creaoferta', 'CreacionOfertaController@CreaOferta');

    //ver perfil de la empresa
    Route::get('/verperfil/{id}', 'VerPerfilController@verPerfilEmpresa');

    });
    //Registrar
    Route::post('/registro', 'Auth\CompanyRegisterController@create');
});
