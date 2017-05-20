<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{

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

    public function scopeNumPrintsBlackAndWhite($query)
    {
        $num = 0;
        foreach ($this->users()->get() as $user) {
            $num += $user->requests()->blackAndWhite()->count();
        }
        return $num;
    }

    public function scopeNumPrintsColor($query)
    {
        $num = 0;
        foreach ($this->users()->get() as $user) {
            $num += $user->requests()->colored()->count();
        }
        return $num;
    }

    public function scopeNumFuncionarios($query, $department)
    {
        dd(DB::table('users')->where('department_id', '=', $department->$id)->get()->count());
        return DB::table('users')->where('department_id', '=', $department->$id)->get()->count();
    }
}
