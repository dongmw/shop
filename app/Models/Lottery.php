<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lottery extends Model
{
    protected $guarded = [];

    function Customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }
}
