<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TieneTitulo extends Model
{
    //

        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'carrera_id',
        'alumno_id',
    ];
}
