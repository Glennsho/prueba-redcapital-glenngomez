<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Menu;

class Submenu extends Model
{
    //
    public function menus()
    {
        return $this->belongsToMany('App\Menu');
    }
}
