<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PruebaController;
Route::group(['middleware'=>['cors']], function (){

    Route::post('/creaoferta', 'CreacionOfertaController@CreaOferta');
});
