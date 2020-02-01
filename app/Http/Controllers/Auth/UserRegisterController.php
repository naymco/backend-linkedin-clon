<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Auth\RegistersUsers;

class UserRegisterController extends Controller
{
    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    public function rules(){
        return[
            'name' => 'required|string|max:25',
            'surname' => 'required|string|max:25',
            'email' => 'required|string|email|max:255|unique',
            'password' => 'required|min:8|string',
            'description' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
           // 'foto' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            // 'remember_token' =>  'string|max:255',
            'zip_code'=> 'required|string|max:255',
            'province'=> 'required|string|max:255',
        ];
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @body  array  $data
     * @return \App\Usuario
     */
    protected function create(Request $data)
    {

        try{
            $data->validate([
                'name' => 'required|string|max:25',
                'surname' => 'required|string|max:25',
                'email' => 'required|string|email|max:255|unique',
                'password' => 'required|min:8|string',
                'phone' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                // 'foto' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                // 'remember_token' =>  'string|max:255',
                'zip_code'=> 'required|string|max:255',
                'province'=> 'required|string|max:255',
            ]);
            return Usuario::create([
                    'name'=>$data{"name"},
                    'surname'=>$data{"surname"},
                    'email'=>$data{"email"},
                    'phone'=>$data{"phone"},
                    'address'=>$data{"address"},
                    'password'=>encrypt($data{"password"}),
                    'country' => $data{"country"},
                    'zip_code'=> $data{"zip_code"},
                    'province'=> $data{"province"},

                ]

            );
        } catch (\Exception $e) {
            return $e->getMessage();


        }
    }

}
