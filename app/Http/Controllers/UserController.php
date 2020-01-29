<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
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

        //Subir la imagen
        $image = $request->file('image');
          if($image){
              //Poner nombre unico
             $image_name = time().$image->getClientOriginalName();

             //Guardamos en la caqrpeta storage(storage/app/users)
             Storage::disk('users')->put($image_name, File::get($image));

             //seteo el nombre de la imagen en el objeto
             $user->image = $image_name;
          }

       
        //Ejecutar consulta y cambios en la base de datos
        $user->update();

        return redirect()->route('config')
                         ->with(['message'=>'Usuario actualizado correctamente']);
    }

    public function getImage($filename){
        $file = Storage::disk('users')->get($filename);
        return new Response($file,200);
    }
}
