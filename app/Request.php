<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    protected $fillable = [
        'user_id', 'offer_works_id', 'state'
    ];

    protected $table = 'request';
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
