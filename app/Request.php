<?php

namespace App;

use Carbon\Carbon;
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

    public function scopeDone($query)
    {
        return $query->where('status', '2');
    }

    public function scopeColored($query)
    {
        return $query->where('colored', '1');
    }

    public function scopeBlackAndWhite($query)
    {
        return $query->where('colored', '0');
    }

    public function scopeOfToday($query)
    {
        return $query->where('created_at', Carbon::now()->toDateString());
    }

    public function scopeOfMonth($query)
    {
        return $query
        ->where('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())
        ->where('created_at', '>=', Carbon::now()->endOfMonth()->toDateString());
    }
}
