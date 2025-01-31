<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    //
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'encargado_id',
        'logo',
        'nombre',
        'tamanyo',
        'email',
        'NIF',
    ];
}
