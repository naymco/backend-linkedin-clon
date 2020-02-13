<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StateAdd extends Model
{protected $fillable = [
    'user_id', 'company_id', 'checking_state'
];
    //
    protected $table = 'state_add';

    public function user()
    {
        $this->belongsTo('App\User', 'user_id');
    }

/*    public function company()
    {
        $this->belongsTo('App\Company', 'company_id');
    }*/
    public function company_offer()
    {
        $this->hasOne('App\CompanyOffer');
    }

}
