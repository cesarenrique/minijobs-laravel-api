<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaReclutador extends Model
{
    //

            //
            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'reclutador_id',
        'empresa_id',
    ];
}
