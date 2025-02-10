<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLimitacion extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [

        'user_id',
        'fecha_limite_administrador',
        'fecha_limite_encargado',
        'fecha_limite_reclutador',
        'fecha_limite_profesor',
        'fecha_limite_alumno',
        'fecha_limite_mentor',
    ];

}
