<?php

namespace App\Http\Controllers;

use App\StateAdd;
use App\User;
use App\OfferWorks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SolicitarOfertaController extends Controller
{
    //
    public function solicitarOferta(Request $request){

        $body = $request->input();
        // $header = $request->header('authorization');
        $comprobarPuestoTrabajo= DB::table('offer_works')->where('id', '=', $body{'offer_id'})->get();
        $comprobarUsuarioExistente= DB::table('users')->where('id', '=', $body{'user_id'})->get();
        if($comprobarPuestoTrabajo){

            if($comprobarUsuarioExistente){


              DB::table('state_add')
                    ->insert([
                        'offer_id'=>$comprobarPuestoTrabajo[0]->id,
                        'user_id'=>$comprobarUsuarioExistente[0]->id,
                        'checking_state'=>"Pendiente"
                    ]);

                return ['Mensaje'=>'Se ha completado'];


            }
        }
    }

}
