<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TieneSkill extends Model
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

    ];
}
