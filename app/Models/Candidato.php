<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidato extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'alumno_id',
        'anuncio_id',
        'puntuacion_academica',
        'puntuacion_experiencia',
        'puntuacion_personal',
        'puntuacion_mentor',
        'test_skills',
    ];


}
