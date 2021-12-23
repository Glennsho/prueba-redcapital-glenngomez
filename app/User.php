<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Rol');
    }

    public function files()
    {
        return $this->belongsToMany('App\Archivo');
    }

    /**
     * Del arreglo, comprueba si los existentes corresponden con los registrados
     * entre la tabla rol y tabla intermedia rol=user
     *
     * @param [type] $roles
     * @return boolean
     */
    public function hasAnyRoles($roles){
        if ($this->roles()->whereIn('slug',$roles)->first()) {
            return true;
        }

        return false;
    }

    /**
     * comprueba si los existentes roles en BD coincide con el parametro
     * recibido
     * @param [type] $rol
     * @return boolean
     */
    public function hasRol($rol){
        if ($this->roles()->where('slug',$rol)->first()) {
            return true;
        }

        return false;
    }
}
