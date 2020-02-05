<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use APP\Like;

class LikeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function like($image_id){
        //Recoger datos del usuario y la imagen
        $user = \Auth::user();


        //Condicion para ver siya existe un like
        $isset_like = Like::where('user_id', $user->id)
            ->where('image_id', $image_id);

        if($isset_like == 0){
            $like = new Like();
            $like-> user_id = $user->id;
            $like-> image_id = (int)$image_id;

            //Guardamos en la base de datos
            $like->save();

            return response()->json([
                'like' => $like
            ]);
        }else{
            return response()->json([
                'message' => 'El like ya existe'
            ]);
        }

    }

    public function dislike($image_id){

    }
}
