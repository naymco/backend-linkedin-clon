<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class Company extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $table = 'company';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $hidden = [
        'cif', 'zip_code', 'province_id', 'country'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

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

    public function province()
    {
        return $this->hasOne('App\Province', 'province_id');
    }

}
