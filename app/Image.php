<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $table = 'images';

    // Relación One To Many / Uno a muchos // Un sólo modelo puede tener muchos comentarios.
    public function comments()
    {
        // Cuando yo llame a comments obtendré el objeto de los comentarios
        return $this->hasMany('App\Comment')->orderBy('id', 'desc');
    }

    //Relación One To Many con Likes
    public function likes()
    {
        // Me sacará todos los registros de la DB de los likes que tiene la imagen.
        return $this->hasMany('App\Like');
    }

    // Relación para sacar usuario que puso la imagen
    // Relación de Muchos a Uno / Un usuario puede tener muchas imágenes
    public function user()
    {
        // Sacaré al usuario relacionado con la imagen por el user_id de la imagen
        return $this->belongsTo('App\User', 'user_id');
    }

    public function company()
    {
        return $this->belongsTo('App\Company', 'company_id');
    }





}
