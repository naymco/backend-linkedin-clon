<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerPerfilController extends Controller
{

    public function verPerfilEmpresa($id){
        $perfil=DB::table('company')
            ->where('company.id', '=', $id)
            ->get();
        return $perfil;
    }
    public function verPerfilUsuario($id){
        $perfil=DB::table('users')
            ->where('users.id', '=', $id)
            ->get();
        return $perfil;
    }
}
