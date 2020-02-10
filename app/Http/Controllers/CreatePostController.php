<?php

namespace App\Http\Controllers;

use App\Company;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CreatePostController extends Controller
{
    public function CreatePost(Request $request)
    {

        $post = $request->input();
        DB::table('images')->insert([
            [
                'image_path' => $post{
                    'image_path'},
                'description' => $post{
                    'description'},
                'user_id' => $post{
                    'user_id'},
                'company_id' => null,
                'created_at' => $post{
                    'created_at'},
                'updated_at' => null
            ]
        ]);
        return response($post);
    }


    public function uploadfile(Request $request)
    {
        $img = "default.png";
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $img = time() . $file->getClientOriginalName();
            $file->move(public_path() . '/storage/', $img);
        }
        return $img;
    }

    public function getImage(Request $request)
    {
        // $imgPath = DB::table('images')->get('image_path');
        $imgPath = $request->file('public');
        Storage::url($imgPath);
        $path_file = '/storage/' . $imgPath;
        return response($path_file);
        // $description = $request->input('description');



        // // //Asignar valores nuevo objeto
        // $user = DB::table('users')
        //     ->where('users.id', '=', 'user_id')
        //     ->get();
        // $image = new Image();
        // $image->user_id = $user->id;

        // $image->description = $description;

        // // //Subir fichero
        // if ($image_path) {
        //     $image_path_name = time() . $image_path->getClientOriginalName();
        //     Storage::file('public')->put($image_path_name, File::get($image_path));
        //     $image->image_path = $image_path_name;
        // }
    }
}
