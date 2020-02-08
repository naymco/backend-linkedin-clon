<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                // 'user_id' => $post{
                //     'user_id'},
                // 'company_id' => $post{
                //     'company_id'},
                // 'created_at' => $post{
                //     'created_at'},
                // 'updated_at' => null
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
            $file->move(public_path() . '/img/', $img);
        }
    }
}
