<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    public function scopeFilterBy($query, $filter)
    {
        return $this->get()->contains($filter);
    }
}
