<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TieneSkillExperiencia extends Model
{
    //

                    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'skill_id',
        'alumno_id',
        'nivel',
        'validacion',
        'asignatura_id',
        'profesor_id',
        'empresa_cargo_experiencia_id',
        'tiempo_meses'

    ];
}
