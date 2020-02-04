<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertasSectorController extends Controller
{
    public function ofertasSector($sector)
    {
        try{
            $ofertasPorSector = DB::table('offer_works')
                ->where('offer_works.sector', '=', $sector)
                ->get();

            return $ofertasPorSector;
        }
        catch(\Illuminate\Database\QueryException $ex){
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    }
}
