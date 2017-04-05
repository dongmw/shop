<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['identifier'];
    public $timestamps = false;

    protected $appends = array('url', 'thumb', 'medium');

    use \App\Http\Traits\Image;
}
