<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaCentro extends Model
{
    //


            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'asignatura_id',
        'carrera_id',
        'centro_id',
    ];
}
