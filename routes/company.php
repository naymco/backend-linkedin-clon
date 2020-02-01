<?php

use Illuminate\Http\Request;
use App\Http\Controllers\DatosController;
Route::group(['middleware'=>['cors']], function (){

    Route::post('/creaoferta', 'CreacionOfertaController@CreaOferta');

    //Registrar
    Route::post('/registro', 'Auth\CompanyRegisterController@create');
});
