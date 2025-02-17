<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TipoRamaCarrera;
use App\Models\AnyoPlanAcademico;
class Carrera extends Model
{
    //

            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'centro_id',
        'tipo_rama_carrera_id',
    ];

    public function anyoPlanAcademico():hasOne {
        return $this->hasOne(AnyoPlanAcademico::class,'id','anyo_plan_academico_id');
    }


    public function tipoRamaCarrera():hasOne {
        return $this->hasOne(TipoRamaCarrera::class,'id','tipo_rama_carrera_id');
    }

}
