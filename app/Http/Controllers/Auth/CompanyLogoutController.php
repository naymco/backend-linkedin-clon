<?php

namespace App\Http\Controllerss\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class CompanyLogoutController extends Controller
{
    public function DesconectarEmpresa(Request $request){
        $body = $request->input();
        $companyTest = DB::table('company')
            ->where('id', '=', $body{'id'})
            ->get();
        if(count($companyTest) ===1){
            $companyTest = DB::table('company')
                ->where('id', '=', $body{'id'})
                ->update(['remember_token'=>null]);
            return response('Te has desconectado correctamente');
        }else{
            return response('Ha ocurrido un error');
        }
        return $companyTest;
    }
}
