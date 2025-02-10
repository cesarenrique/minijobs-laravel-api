<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    //


        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'forma_pago_id',
        'numero',
        'mes',
        'anyo',
        'clave',
    ];
}
