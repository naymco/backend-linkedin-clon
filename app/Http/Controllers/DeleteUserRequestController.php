<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeleteUserRequestController extends Controller
{
    public function deleteRequest(Request $request){
        $body=$request->input();
        $comprobarSolicitud=DB::table('request')
            ->where('id', '=', $body{'id'})
            ->where('id_user', '=', $body{'id_user'})
            ->get();
        if(count($comprobarSolicitud) === 1 && $comprobarSolicitud[0]->estado !== "Pendiente"){
            $comprobarSolicitud=DB::table('request')
                ->where('id', '=', $body{'id'})
                ->where('id_user', '=', $body{'id_user'})
                ->update(['visible_user' => 0]);
            return response('Eliminado correctamente');
        }else{
            return response('Upss ocurrio un error');
        }
    }
}
