<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OfertasCiudadesController extends Controller
{
    public function ofertasCiudades()
    {
        try {
            $ofertasPorCiudad = DB::table('offer_works')
                ->join('provinces', 'offer_works.province_id', '=', 'provinces.id')

                // ->orderBy('provinces.city')
                ->get();

            return $ofertasPorCiudad;
        } catch (\Illuminate\Database\QueryException $ex) {
            return ($ex->getMessage());
            // Note any method of class PDOException can be called on $ex.
        }
    }

    public function ofertasCiudad($nombreciudad)
    {
        $ofertasPorCiudad = DB::table('offer_works')
            ->join('provinces', 'offer_works.province_id', '=', 'provinces.id')
            ->orderBy('provinces.city')
            ->where('provinces.city', '=', $nombreciudad)
            ->get();

        return $ofertasPorCiudad;
    }

    public function provincesCategory()
    {
        $provinces = DB::table('provinces')->get();

        return $provinces;
    }

    public function provinceId($name)
    {
        $provinces = DB::table('provinces')
        ->where('city', '=', $name)
        ->get();

        return $provinces;
    }
}
