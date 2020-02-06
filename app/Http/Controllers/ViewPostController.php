<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewPostController extends Controller
{
    //
    public function postPublicados(){
        try{
            $creacionPost= DB::table('images')
                ->where('user_id', '=', true)
             //   ->where('company_id', '=', true)
                ->get();
            return $creacionPost;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    }

}
