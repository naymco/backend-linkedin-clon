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
                ->join('company', 'offer_works.company_id', '=', 'company.id')

                //->where('title_offer', '=', false)
                ->get();
            return $ofertasAnuncios;

        }
        catch(\Illuminate\Database\QueryException $ex){
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    }

}
