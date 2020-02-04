<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EliminarSolicitudEmpresaController extends Controller
{
    public function borrarSolicitud(Request $request){
        $body=$request->input();
        $comprobarSolicitud=DB::table('request')
            ->join('offer_works', 'offer_works.id', '=', 'request.offer_works_id')
            ->where('request.id', '=', $body{'id'})
            ->where('offer_works.company_id', '=', $body{'compqany_id'})
            ->get();
        if(count($comprobarSolicitud) === 1 && $comprobarSolicitud[0]->estado !== "Pendiente"){
            $comprobarSolicitud=DB::table('request')
                ->join('offer_works', 'offer_works.id', '=', 'request.offer_works_id')
                ->where('request.id', '=', $body{'id'})
                ->where('offer_works.company_id', '=', $body{'company_id'})
                ->update(['request.visible_company' => 0]);
            return response('Borrado correctamente');
        }else{

            return response(count($comprobarSolicitud));
        }
        // return $comprobarSolicitud;
    }
}
