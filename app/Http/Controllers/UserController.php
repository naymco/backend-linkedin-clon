<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config (){
        return view('user.config');
    }
    public function update (Request $request){
        //Conseguir el usuario identificado 
        $user = \Auth::user();
        $id = $user->id;


        //Validacion del formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id
        ]);

       // recoger datos del formulario
        $name = $request->input('name');
        $email = $request->input('email');

        //Asignar nuevos valores al objeto del usuario
        $user-> name = $name;
        $user-> email = $email;

        //Ejecutar cibsulta y cambios en la base de datos
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);
    }
}
