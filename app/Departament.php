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
        return $this->belongsTo('App\User', 'id', 'department_id');
    }

    public function numTotalOfPrints()
    {
        $num = 0;
        foreach ($this->users()->get() as $user) {
            $num += $user->print_counts;
        }
        return $num;
    }

    public function numPrintsBlackAndWhite()
    {
        $num = 0;
        return $num;
    }

    public function numPrintsColor()
    {
       $num = 0;
        return $num;
    }
}
