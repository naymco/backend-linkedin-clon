<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function config (){
        return view('user.config');
    }
    public function update (Request $request){
        $id = \Auth::user()->id;

        $validate = $this->validate($request,[
            'name' => 'required','string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique',
        ]);

       
        $name = $request->input('name');
        $email = $request->input('email');

        die();
    }
}
