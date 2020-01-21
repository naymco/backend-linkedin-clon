<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OfferWorks extends Model
{
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function state_add()
    {
        $this->hasOne('App\StateAdd', 'company_id');
    }
}
