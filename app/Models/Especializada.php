<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\Sector;
class Especializada extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nombre',
        'sector_id',
    ];

    public function sector():hasOne {
        return $this->hasOne(Sector::class,'id','sector_id');
    }

}
