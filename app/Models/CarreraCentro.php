<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarreraCentro extends Model
{
    //

                /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'centro_id',
        'carrera_id',
    ];
}
