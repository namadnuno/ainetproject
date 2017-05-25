<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{

    public $table = 'departments';

    /**
     * Get the users that owns the department.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'department_id');
    }

    /**
     * Relação com os pedidos
     * Um user tem vários pedidos
     */
    public function requests()
    {
        return $this->hasManyThrough(Request::class, User::class, 'department_id', 'owner_id');
    }


    /**
     * Scope para fazer o filtro
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $filter
     * @return mixed
     */
    public static function scopeSearch($query, $filter = '')
    {
        return $query->where('name', 'LIKE', '%' . $filter . '%');
    }
}
