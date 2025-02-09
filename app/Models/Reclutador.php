<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Anuncio;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reclutador extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
    ];

    public function user():hasOne {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function anuncios():hasMany {
        return $this->hasMany(Anuncio::class,'reclutador_id','id');
    }
}
