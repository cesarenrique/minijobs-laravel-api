<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\AnyoPlanAcademico;

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

    public function anyoPlanAcademico():hasOne {
        return $this->hasOne(AnyoPlanAcademico::class,'id','anyo_plan_academico_id');
    }

}
