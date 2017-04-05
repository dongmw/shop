<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    protected $guarded = [];

    use SoftDeletes;

    protected $appends = array('original', 'thumb', 'medium');
    use \App\Http\Traits\Image;

    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**每个商品都有很多分类
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    /**每个商品都有一个品牌
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    function brand()
    {
        return $this->belongsTo('App\Models\Brand');
    }

    /**每个商品对应多张图片
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function product_galleries()
    {
        return $this->hasMany('App\Models\ProductGallery');
    }

}
