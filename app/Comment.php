<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment', 'request_id', 'parent_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function childrens()
    {
        return $this->hasMany(App::Comment, 'parent_id', 'id');
    }

    public function scopeParents($query)
    {
        return $query->where('parent_id', null);
    }

    public function scopeAtives($query)
    {
        return $query->where('blocked', '0');
    }


    /**
     * Scope para fazer o filtro
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeOfType($query, $filter)
    {
        return $query->where('comment', 'LIKE', '%' . $filter . '%');
    }
}
