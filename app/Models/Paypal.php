<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    //
            /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'forma_pago_id',
        'email',
    ];
}
