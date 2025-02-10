<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CargoEmpresa extends Model
{
    //
        //
            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'cargo_id',
        'empresa_id',
        'descripcion',
    ];

}
