<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\RegistersUsers;

class CompanyRegisterController extends Controller
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

    protected function create(Request $data)
    {

        try{


            $data->validate([
                'cif' => 'required|string|max:25',
                'email' => 'required|string|max:255|unique:company',
                'password' => 'required|min:8|string',
                'name' => 'required|string|max:255',
                /*'zip_code' => 'required|string|max:255',
                'country' => 'required|string|max:255',
               // 'province_id' => 'required|
                string|max:255',
                'phone' => 'required|string|max:255',
                'web_page' => 'required|string|max:255'*/

            ]);
            return Company::create([
                    'cif'=>$data{"cif"},
                    'email'=>$data{"email"},
                    'password'=>encrypt($data{"password"}),
                    'name'=>$data{"name"},
                    /*'zip_code'=>$data{"zip_code"},
                    'country'=>$data{"country"},
                    //'province_id'=>$data{"province_id"},
                    'phone'=>$data{"phone"},
                    'web_page'=>$data{"phone"},*/

                ]

            );

        } catch (\Exception $e) {
           return $e->getMessage();


        }
    }
}
