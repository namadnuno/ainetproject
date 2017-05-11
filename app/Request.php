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

    /**
     * Todos os comentários associados ao pedido
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'request_id', 'id');
    }

    /**
     * Scope para fazer o filtro
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param $filter
     * @return mixed
     */
    public function scopeOfType($query, $filter)
    {
        return $query->where('description', 'LIKE', '%' . $filter . '%');
    }

    /**
     * Scope para todos os pedidos completos
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeDone($query)
    {
        return $query->where('status', '2');
    }

    /**
     * Scope para todos os pedidos a cores
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeColored($query)
    {
        return $query->where('colored', '1');
    }

    /**
     * Scope para todos os pedidos a preto e branco
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBlackAndWhite($query)
    {
        return $query->where('colored', '0');
    }

    /**
     * Scope para todos os pedidos feitos no dia atual
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfToday($query)
    {
        return
        $query->where('created_at', '>=', Carbon::now()->startOfDay()->toDateTimeString())
        ->where('created_at', '<=', Carbon::now()->endOfDay()->toDateTimeString());
    }

    /**
     * Scope para todos os pedidos feitos neste mês
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfMonth($query)
    {
        return $query
        ->where('created_at', '>=', Carbon::now()->startOfMonth()->toDateString())
        ->where('created_at', '<=', Carbon::now()->endOfMonth()->toDateString());
    }

    /**
     * Scope para todos os pedidos feitos nesta semana
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfWeek($query)
    {
        return $query
        ->where('created_at', '>=', Carbon::now()->startOfWeek()->toDateString())
        ->where('created_at', '>=', Carbon::now()->endOfWeek()->toDateString());
    }

    public function scopeBetween($query, $dataInicio, $dataFim)
    {
         return $query
        ->where('created_at', '>=', $dataInicio->toDateTimeString())
        ->where('created_at', '<=', $dataFim->toDateTimeString());
    }

    public function isRecusado()
    {
        return $this->status == '0';
    }
}
