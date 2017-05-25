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

    public function request()
    {
        $this->belongsToMany(Request::class);
    }
}
