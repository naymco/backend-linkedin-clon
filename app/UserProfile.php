<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    public function userId()
    {
        return $this->morphTo();
    }

    // Relación uno a uno
    protected $table = 'user_profile';

    public function user()
    {
        return $this->morphOne('App\User', 'user_id');
    }

}
