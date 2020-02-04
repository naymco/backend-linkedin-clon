<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CompanyLoginController extends Controller
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

    public function loginCompany(Request $request){




      try {

            $body =$request->input();

           $userCompro = DB::table('company')
                ->where('email', '=', $body{'email'})
                ->get();
            if(count($userCompro) === 0){
                return response('Datos incorrectos');
            }



            $testPass=decrypt($userCompro[0]->password);

            $password= ($body{'password'});


            if($testPass === $password){
               $generarToken=encrypt(str_random(15));
                     DB::table('users')
                    ->where('email', '=', $body{'email'})
                    ->update(['remember_token'=>$generarToken]);
                return 'Te has conectado correctamente';
            }else{
                return  response('Datos incorrectos');
            }

            //code...
        } catch (\Exception $e) {
            //throw $th;
            return $e->getMessage();
        }

       // return $testPass;


    }
}
