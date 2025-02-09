<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BuscaSkill extends Model
{
    //
                /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'anuncio_id',
        'skill_id',
    ];
}
