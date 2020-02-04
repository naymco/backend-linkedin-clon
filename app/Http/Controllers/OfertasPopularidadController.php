<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfertasPopularidadController extends Controller
{
    public function ofertasOrdenadas()
    {
        try{
            $ofertasOrdenadas = DB::table('offer_works')
                ->orderBy('required_skills', 'desc')
                ->get();
        }
        catch(\Illuminate\Database\QueryException $ex){
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }

        return $ofertasOrdenadas;
    }
}
