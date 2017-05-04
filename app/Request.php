<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'open_date','quantity',
        'colored', 'stapled', 'paper_size',
        'paper_type', 'file'];

    public function comments()
    {
        return $this->hasMany('App\Comment', 'request_id', 'id');
    }

    /**
     * Scope para fazer o filtro
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeOfType($query, $filter)
    {
        return $query->where('description', 'LIKE', '%' . $filter . '%');
    }
}
