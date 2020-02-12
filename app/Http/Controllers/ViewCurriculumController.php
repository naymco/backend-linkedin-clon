<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewCurriculumController extends Controller
    //
    {
        public function curriculumId($id)
    {
        $curriculum = DB::table('users_curriculum')
            ->where('user_id', '=', $id)
            ->get();

        return $curriculum;
    }
}
