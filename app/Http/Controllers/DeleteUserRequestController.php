<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteUserRequestController extends Controller
{
    public function deleteRequest(Request $request){
        $body=$request->input();
        $comprobarSolicitud=DB::table('request')
            ->where('id', '=', $body{'id'})
            ->where('user_id', '=', $body{'user_id'})
            ->get();
        if(count($comprobarSolicitud) === 1 && $comprobarSolicitud[0]->estado !== "Pendiente"){
            $comprobarSolicitud=DB::table('request')
                ->where('id', '=', $body{'id'})
                ->where('user_id', '=', $body{'user_id'})
                ->update(['visible_user' => 0]);
            return response('Eliminado correctamente');
        }else{
            return response('Upss ocurrio un error');
        }
    }
}
