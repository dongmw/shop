<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo('App\Models\Shop\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Shop\Product');
    }
}
