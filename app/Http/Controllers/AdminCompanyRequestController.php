<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCompanyRequestController extends Controller
{
    public function AdministrarSolicitud(Request $request){
        //id solicitud y id_empresa
        $numSolicitud = $request->input();
        $comprobarEstado=DB::table('request')
            ->join('offer_works', 'offer_works.id', '=', 'request.offer_works_id')
            ->where('request.id', '=', $numSolicitud{'id'})
            ->where('offer_works.company_id', '=', $numSolicitud{'company_id'})
            ->get();

        if($comprobarEstado[0]->estado === 'Aceptado' || $comprobarEstado[0]->estado === 'Rechazado' ){


            return response('La oferta ya fue aceptada o rechazada');
        }else{
            DB::table('request')
                ->join('offer_works', 'offer_works.id', '=', 'request.offer_works_id')
                ->where('request.id', '=', $numSolicitud{'id'})
                ->where('offer_works.company_id', '=', $numSolicitud{'company_id'})
                ->update(['estado' =>$numSolicitud{'estado'}]);
            return response('Completado corretamente');
        }
        // return $comprobarEstado;
    }
}
