<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Rol;

class Menu extends Model
{
    // Relacion con modelo Rol
    public function roles()
    {
        return $this->belongsToMany('App\Rol');
    }
}
