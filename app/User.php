<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
     * Relação com os pedidos
     * Um user tem vários pedidos
     */
    public function requests()
    {
        return $this->hasMany('App\Request', 'owner_id', 'id');
    }

    /**
     * Relação entre o user e o departamento
     * Um user tem um departamento
     */
    public function departament()
    {
        return $this->hasOne('App\Departament', 'id', 'department_id');
    }
}
