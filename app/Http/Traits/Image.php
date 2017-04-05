<?php
namespace App\Http\Traits;

trait Image
{

    public function getUrlAttribute()
    {
        if ($this->identifier) {
            return env('QINIU_IMAGES_LINK') . $this->identifier;
        }
    }

    //小型缩略图
    public function getThumbAttribute()
    {
        if ($this->identifier) {
            return env('QINIU_IMAGES_LINK') . 'thumb_' . $this->identifier;
        }
    }

    //中型缩略图
    public function getMediumAttribute()
    {
        if ($this->identifier) {
            return env('QINIU_IMAGES_LINK') . 'medium_' . $this->identifier;
        }
    }
}
