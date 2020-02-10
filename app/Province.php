<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    public function users()
    {
        return $this->hasMany('App\User', 'province_id');
    }

    public function company()
    {
        return $this->hasMany('App\Company', 'province_id');
    }
}
