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
        return $this->hasMany('App\User', 'department_id');
    }

    public function requests()
    {
        $requests = [];
        foreach ($this->users()->get() as $user) {
            foreach ($user->requests as $request) {
                $requests[] = $request;                
            }
        }
        return $requests;
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
}
