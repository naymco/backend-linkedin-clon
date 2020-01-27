<?php

namespace App\Http\Controllers;

use App\Company;
use http\Params;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;

class PassportController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */


    public function register(Request $request)
    {
        //ESTABLECER LA LÓGICA CON UNA VARIABLE EN $REQUEST DONDE PONGA SI ES EMPRESA O USUARIO. ESTARÁ OCULTA EN FORMULARIOS Y PREDEFINIDA SEGÚN ELIJA EL CLIENTE LA
        //OPCIÓN DE 'EMPRESA' O 'USUARIO'. --- IF{} ELSE{} ----
        if ($request->tipo == 'company') {
//            return 'company';
            //comprobación si el correo está asociado a una cuenta
            if (Company::where('email', $request->email)->exists() or app_path('./company/register')  == false) {
                return response()->json(['message' => "El correo ya está asociado a una cuenta"], 400);
            }
            $this->validate($request, [
                'name' => 'required|min:6|unique:company',
                'email' => 'required|email|unique:company',
                'password' => 'required|min:8',
            ]);
            $company = Company::create([
                'name' => $request->name_company,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $token = $company->createToken('passport')->accessToken;
            return response()->json(['message' => 'Usuario registrado con éxito', 'token' => $token], 200);
        } else {
            //comprobación si el correo está asociado a una cuenta
            if (User::where('email', $request->email)->exists()) {
                return response()->json(['message' => "El correo ya está asociado a una cuenta"], 400);
            }
            $this->validate($request, [
                'name' => 'required|min:6',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:8',
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
            $token = $user->createToken('passport')->accessToken;
            return response()->json(['message' => 'Usuario registrado con éxito', 'token' => $token], 200);
        }
    }

    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('TutsForWeb')->accessToken;
            return response()->json(['token' => $token], 200);
        } else {
            return response()->json(['error' => 'UnAuthorised'], 401);
        }
    }

    /**
     * Returns Authenticated User Details
     *
     * @return JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user(), 'company'=> auth()->company], 200);
    }


}
