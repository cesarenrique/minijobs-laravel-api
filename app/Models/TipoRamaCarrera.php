<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\TipoCarrera;
use App\Models\Carrera;
class TipoRamaCarrera extends Model
{
    //


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'tipo_carrera_id',

    ];

    public function tipoCarrera():hasOne {
        return $this->hasOne(TipoCarrera::class,'id','tipo_carrera_id');
    }

    public function carreras():hasMany {
        return $this->hasMany(Carrera::class,'tipo_rama_carrera_id','id');
    }

}
