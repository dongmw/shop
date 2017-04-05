<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $guarded = [];

    function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
