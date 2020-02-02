<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfferWorksController extends Controller
{
    //
    public function ofertasAnuncios(){
        try{
            $ofertasAnuncios= DB::table('offer_works')
                ->where('title_offer', '=', true)
                ->get();
            return $ofertasAnuncios;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    }

}
