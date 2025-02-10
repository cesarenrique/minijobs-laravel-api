<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PagoLimitacion extends Model
{
    //
                                /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'pago_suscripcion_id',
        'dia_corte',
    ];
}
