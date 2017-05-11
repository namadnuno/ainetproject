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

    public function request()
    {
        $this->belongsToMany(Request::class);
    }
}
