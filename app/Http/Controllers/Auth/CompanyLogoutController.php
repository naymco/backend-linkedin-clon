<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class CompanyLogoutController extends Controller
{
    public function logout (Request $request){
        $body = $request->input();
        $userTest = DB::table('company')
            ->where('id', '=', $body{'id'})
            ->get();
        if(count($userTest) ===1){
            DB::table('users')
                ->where('id', '=', $body{'id'})
                ->update(['remember_token'=>null]);
            return response('Desconectado correctamente');
        }else {
            return response('Upps ocurrio un error');
        }
    }
}
