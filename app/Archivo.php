<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    // Relacion con modelo Usuario
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }

}
