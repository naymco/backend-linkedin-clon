<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginUsuario(Request $request){



        try {

            $body =$request->input();
            $comprobarUsuarioExistente = DB::table('user')
                ->where('email', '=', $body{'email'})
                ->get();
            if(count($comprobarUsuarioExistente) === 0){
                return response('Algo esta mal');
            }



            $passTest=decrypt($comprobarUsuarioExistente[0]->contrasenia);

            $password= ($body{'password'});


            if($passTest === $password){
                $generarToken=encrypt(str_random(15));
                $actualizarToken= DB::table('user')
                    ->where('email', '=', $body{'email'})
                    ->update(['remember_token'=>$generarToken]);
                return 'Te has conectado correctamente';
            }else{
                return  response('Contrasenia o correo invalido');
            }

            //code...
        } catch (\Exception $e) {
            //throw $th;
            return response('Ha ocurrido un error');
        }

        // return $comprobarcontrasenia;

    }
}
