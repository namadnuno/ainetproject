<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'admin', 'blocked', 'password', 'phone', 'profile_url', 'presentation', 'department_id', 'print_evals', 'print_counts'
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
        return $this->hasMany(Request::class, 'owner_id');
    }

    /**
     * Relação entre o user e o departamento
     * Um user tem um departamento
     */
    public function departament()
    {
        return $this->belongsTo(Departament::class, 'department_id');
    }

    /**
     * Scope para fazer o filtro
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeOfType($query, $filter)
    {
        return $query->where('name', 'LIKE', '%' . $filter . '%');
    }

    public function scopeActive($query)
    {
        return $query->where('blocked', '0');
    }

    public function isAdmin()
    {
        return $this->admin === '1';
    }
}
