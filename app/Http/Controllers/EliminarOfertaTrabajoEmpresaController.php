<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EliminarOfertaTrabajoEmpresaController extends Controller
{
    public function borrarOfertaTrabajo(Request $request){
        $body=$request->input();
        $comprobarSolicitud=DB::table('offer_works')
            ->where('id', '=', $body{'id'})
            ->where('company_id', '=', $body{'company_id'})
            ->get();
        if(count($comprobarSolicitud) === 1){
            $comprobarSolicitud=DB::table('offer_works')
                ->where('id', '=', $body{'id'})
                ->where('company_id', '=', $body{'company_id'})
                ->update(['visible_company' => 0, 'visible_user'=> 0]);
            return response('Borrado correctamente');
        }else{

            return response(count($comprobarSolicitud));
        }
        // return $comprobarSolicitud;
    }
}
