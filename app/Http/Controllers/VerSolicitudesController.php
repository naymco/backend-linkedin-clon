<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerSolicitudesController extends Controller
{

    public function VerSolicitudesEmpresas($id){

        $TodasLasSolicitudes= DB::table('request')
            ->join('offer_works', 'offer_works.id', '=', 'request.offer_works_id')
            ->join('users', 'users.id', '=', 'request.user_id' )
            ->where('offer_works.company_id', '=', $id)
            ->where('offer_works.visible_empresa','=', true)
            ->where('request.visible_company','=', true)
            ->select('request.id as request_num_request'
                ,'request.user_id as request_user'
                ,'request.offer_works_id as request_id _offer_works'
                ,'request.state as request_state'
                ,'request.visible_company as request_visible_company'
                ,'request.visible_user as request_visible_user'
                ,'offer_works.id as offer_works_num'
                ,'offer_works.tittle_offer as offer_works.tittle_offer'
                ,'offer_works.description as offer_works_description'
                ,'offer_works.experience_level as offer_works_experience_level'
                ,'offer_works.sector as offer_works_sector'
                ,'offer_works.required_skills as offer_works_required_skills'
                ,'offer_works.company_id as offer_works_num_company'
                ,'offer_works.category_id as offer_works_category'
                //,'oferta_trabajos.id_ciudad as oferta_trabajos_ciudad'
                ,'offer_works.created_at as offer_works_created_at'
                ,'offer_works.visible_user as offer_works_visible_user'
                ,'offer_works.visible_company as offer_works_visible_company'
                ,'user.name_user as user_name'
                ,'user.surname as user_surname'
                ,'user.description as user_description'
                ,'user.phone as user_phone'
                ,'user.address as user_address'
                ,'user.image as user_image'
                ,'user.remember_token as user_token')
            ->get();
        return $TodasLasSolicitudes;
    }
    public function VerSolicitudesUsuario($id){
        $TodasLasSolicitudes= DB::table('request')
            ->join('request', 'request.id', '=', 'request.offer_works_id')
            ->join('users', 'users.id', '=', 'request.user_id' )
            ->where('request.user_id', '=', $id)
            ->where('offer_works.visible_user','=', true)
            ->where('request.visible_user','=', true)
            ->select('request.id as request_num_request'
                ,'request.user_id as request_user'
                ,'request.offer_works_id as request_offer_works_id'
                ,'request.state as request_state'
                ,'request.visible_company as request_visible_company'
                ,'request.visible_user as request_visible_user'
                ,'offer_works.id as offer_works_num'
                ,'offer_works.tittle_offer as offer_works.tittle_offer'
                ,'offer_works.description as offer_works_description'
                ,'offer_works.experience_level as offer_works_experience_level'
                ,'offer_works.sector as offer_works_sector'
                ,'offer_works.required_skills as offer_works_required_skills'
                ,'offer_works.company_id as offer_works_num_company'
                ,'offer_works.category_id as offer_works_category'
                ,'offer_works.created_at as offer_works_created_at'
                ,'offer_works.visible_user as offer_works_visible_user'
                ,'offer_works.visible_company as offer_works_visible_company'
                ,'user.name_user as user_name'
                ,'user.surname as user_surname'
                ,'user.description as user_description'
                ,'user.phone as user_phone'
                ,'user.address as user_address'
                ,'user.image as user_image'
                ,'user.remember_token as user_token')
            ->get();
        return $TodasLasSolicitudes;

    }
}
