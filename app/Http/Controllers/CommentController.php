<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function save(Request $request){

            //Validación
            $validate = $this->validate($request,[
                'image_id'=> 'integer|required',
                'content' => 'string|required'
            ]);
            //Recoger datos
            $user = \Auth::user();
            $image_id = $request -> input ('image_id');
            $name = $request -> input ('name');
            $content = $request-> input('content');

            //Asigno los valores a mi nuevo objeto
            $comment = new Comment();
            $comment->user_id = $user->id;
            $comment->image_id = $image_id;
            $comment->content = $content;


            //Guardar en la base de datos
            $comment->save();

            //Redireccionamos
            return redirect()->route('noticia.detail',['id => $image_id'])
                ->with([
                    'message' => 'Has publicado tu comentario con exito'
                ]);




    }
}
