<?php

namespace App\Http\Controllers;

use App\OfferWorks;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SolicitarOfertaController extends Controller
{
    //
    public function solicitarOferta(Request $request){

        $body = $request->input();
        // $header = $request->header('authorization');
        $comprobarPuestoTrabajo= DB::table('offer_works')->where('id', '=', $body{'id_offer_works'})->get();
        $comprobarUsuarioExistente= DB::table('users')->where('id', '=', $body{'id_user'})->get();
        if($comprobarPuestoTrabajo){

            if($comprobarUsuarioExistente){


                return Solicitud::create([
                    'id_user'=>$comprobarUsuarioExistente[0]->id,
                    'id_offer_works'=>$comprobarPuestoTrabajo[0]->id,
                    'Estado'=>"Pendiente"
                ]);
            }
        }
    }

}
