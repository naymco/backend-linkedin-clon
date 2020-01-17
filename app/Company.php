<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function images()
    {
        return $this->hasMany('App\Image');
    }
}
