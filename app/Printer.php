<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Printer extends Model
{
    /**
     * Tabela
     * @var string
     */
    public $table = 'printers';

    /**
     * Por causa do mass assignment
     * @var array
     */
    protected $fillable = ['name', 'create_at', 'update_at'];

    /**
     * Relação com os pedidos
     */
    public function requests()
    {
        return $this->hasMany(Request::class, 'printer_id');
    }

    /**
     * Scope para que a impressora possa ser filtrada
     * @param $query
     * @param $filter
     * @return mixed
     */
    public function scopeSearch($query, $filter)
    {
        return $query->where('name', 'LIKE' , "%$filter%");
    }
}
