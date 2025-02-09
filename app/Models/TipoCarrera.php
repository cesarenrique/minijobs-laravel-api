<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TipoRamaCarrera;
class TipoCarrera extends Model
{
    //


    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',

    ];

    public function tipoRamaCarreras():hasMany {
        return $this->hasMany(TipoRamaCarrera::class,'tipo_carrera_id','id');
    }
}
