<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModificarPerfilEmpresaController extends Controller
{
    public function CambiarPerfilEmpresa(Request $request){

        $empresa=$request->input();
        $comprobarEmpresa=DB::table('company')
            ->where('id', '=', $empresa{'id'})
            ->get();


        if(count($comprobarEmpresa) === 1 ){
            DB::table('company')
                ->where('id', '=', $empresa{'id'})
                ->update(['cif' =>$empresa{'cif'},
                    'password' =>encrypt($empresa{'password'}),
                    'image' =>$empresa{'image'},
                    'name' =>$empresa{'name'},
                    'about_us' =>$empresa{'about_us'},
                    'web_page' =>$empresa{'web_page'}]);
            return response('Perfil modificado correctamente');
        }else{

            return response('Upps ocurrio un error');
        }
    }
}
