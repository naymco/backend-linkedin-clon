<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    //
    protected $table = 'company_profile';

    public function company(){
        return $this->hasOne('App\Company');
    }
}
