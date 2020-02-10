<?php

namespace App\Http\Controllers;

use App\Company;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewPostController extends Controller
{
    //
    public function postPublicados()
    {
        try {
            // $creacionPost = DB::table('images')
            //     ->join('users', 'images.user_id', '=', 'users.id')
            //     // ->orderBy('created_at', 'desc')
            //     ->get();
            $creacionPost = Image::with('user')->get();
            return $creacionPost;
        } catch (\Illuminate\Database\QueryException $ex) {
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    }
}
