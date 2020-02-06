<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CreateOfferController extends Controller
{
    //

    public function CreateOffer(Request $request){

        $oferta =$request->input();
        DB::table('offer_works')->insert([
            ['title_offer'=>$oferta{'title_offer'},
                'description'=>$oferta{'description'},
                'experience_level'=>$oferta{'experience_level'},
                'company_id'=>$oferta{'company_id'},
                'category_id'=>$oferta{'category_id'},
                'province_id'=>$oferta{'province_id'},
                'created_at'=>$oferta{'created_at'},
                'updated_at'=>null]
        ]);
        // return $oferta{''};
    }
}
