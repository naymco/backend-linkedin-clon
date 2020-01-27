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
        $name = $request->input('name');
        $email = $request->input('email');

        var_dump($id);
        var_dump($name);
        var_dump($email);

        die();
    }
}
