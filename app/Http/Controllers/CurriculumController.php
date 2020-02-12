<?php

namespace App\Http\Controllers;

use App\Company;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class CurriculumController extends Controller
{
    public function CreateCV(Request $request)
    {

        $post = $request->input();
        DB::table('users_curriculum')->insert([
            [
                'about_me' => $post{
                'about_me'},
                'image' => $post{
                'image'},
                'user_id' => $post{
                'user_id'},
                'work_experience' => $post{
                'work_experience'},
                'education' => $post{
                'education'},
                'skills_and_validations' => $post{
                'skills_and_validations'},
                'interests' => $post{
                'interests'},
                'created_at' => $post{
                'created_at'},
                'updated_at' => null
            ]
        ]);
        return response($post);
    }
}
