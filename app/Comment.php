<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comments';

    // Relación para sacar usuario que puso el comentario
    // Relación de Muchos a Uno / Un usuario puede tener muchos comentarios
    public function user()
    {
        // Sacaré al usuario relacionado con el comentario por el user_id
        return $this->belongsTo('App\User', 'user_id');
    }

    public function company()
    {
        // Sacaré al usuario relacionado con el comentario por el user_id
        return $this->belongsTo('App\Company', 'company_id');
    }

    public function image()
    {
        // Sacaré al imagen relacionada con el comentario por image_id
        return $this->belongsTo('App\Image', 'image_id');
    }
}
