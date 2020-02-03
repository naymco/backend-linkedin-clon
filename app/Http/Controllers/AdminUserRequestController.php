<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUserRequestController extends Controller
{
    public function AdministrarSolicitud(Request $request){
        //id solicitud y id_usuario
        $numSolicitud = $request->input();
        $comprobarEstado=DB::table('request')
            ->where('id', '=', $numSolicitud{'id'})
            ->where('user_id', '=', $numSolicitud{'user_id'})
            ->get();

        if($comprobarEstado[0]->estado === 'Aceptado' || $comprobarEstado[0]->estado === 'Rechazado' ){


            return response('Oferta aceptada o rechazada');
        }else{
            DB::table('request')
                ->where('id', '=', $numSolicitud{'id'})
                ->where('user_id', '=', $numSolicitud{'user_id'})
                ->update(['estado' =>'Rechazado']);
            return response('Completado corretamente');
        }
        // return $comprobarEstado;
    }
}
