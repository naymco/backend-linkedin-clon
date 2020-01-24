<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    public function images()
    {
        return $this->hasMany('App\Image');
    }

    public function company_profile()
    {
        return $this->hasOne('App\CompanyProfile', 'company_id');
    }

    public function company_offer()
    {
        return $this->belongsTo('App\CompanyOffer', 'company_id');
    }

}
