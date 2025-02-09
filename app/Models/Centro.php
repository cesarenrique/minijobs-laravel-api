<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Carrera;

class Centro extends Model
{
    //

        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'anyo_plan_academico_id',
    ];


    public function carreras():hasMany {
        return $this->hasMany(Carrera::class,'centro_id','id');
    }



}
