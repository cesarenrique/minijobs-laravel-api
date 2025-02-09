<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\hasMany;
use App\Models\Especializada;

class Sector extends Model
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

    public function especializadas():hasMany {
        return $this->hasMany(Especializada::class,'sector_id','id');
    }
}
