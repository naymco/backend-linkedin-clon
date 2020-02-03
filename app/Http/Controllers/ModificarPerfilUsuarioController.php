<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificarPerfilUsuarioController extends Controller
{
    public function CambiarPerfilUsuario(Request $request){

        $usuario=$request->input();

        $comprobarUsuario=DB::table('users')
            ->where('id', '=', $usuario{'id'})
            ->get();


        if(count($comprobarUsuario) === 1){
            DB::table('users')
                ->where('id', '=', $usuario{'id'})
                ->update(['name' =>$usuario{'name'},
                    'surname' =>$usuario{'surname'},
                    'password' =>encrypt($usuario{'password'}),
                    'phone' =>$usuario{'phone'},
                    'email' =>$usuario{'email'},
                    'address' =>$usuario{'address'},
                    'country' =>$usuario{'country'},
                    'province' =>$usuario{'province'},
                    'zip_code' =>$usuario{'zip_code'}]);
            return response('Se ha modificado el perfil correctamente');
        }else{

            return response('Se ha producido un error');
        }
        // return $usuario;
    }
}
