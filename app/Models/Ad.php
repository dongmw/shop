<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $guarded = [];

    /**每个广告都有一个分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function AdCategory()
    {
        return $this->belongsTo('App\Models\AdCategory');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Image');
    }
}
