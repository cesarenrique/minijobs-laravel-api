<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagoSuscripcion extends Model
{
    //

                            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'suscripcion_id',
        'user_id',
        'articulo_id',
    ];
}
