<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmpresaEspecializada extends Model
{
    //

        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'empresa_id',
        'especializada_id',
    ];
}
