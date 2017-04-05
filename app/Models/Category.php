<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Category extends Model
{
    protected $guarded = [];

    /**
     * 一对多关联
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    /**每个分类有多个商品
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    function products()
    {
        return $this->belongsToMany('App\Models\Product');
    }

    static function filter_categories()
    {
        $categories = self::has('children.products')->with(['children' => function ($query) {
            $query->has('products');
        }])->get();
        return $categories;
    }
    /**
     * 判断是否category是否有子栏目
     * @param $id
     * @return bool
     */
    static function check_children($id)
    {
        $category = self::with('children')->find($id);
        if ($category->children->isEmpty()){
            return true;
        }
        return false;
    }

    /**缓存
     * @return mixed
     */
    static function get_categories()
    {
        $categories = Cache::rememberForever('Shop_category_categories', function() {
            return self::with(['children' => function($query){
                $query->orderBy('sort_order');
            }])->where('parent_id',0)->orderBy('sort_order')->get();
        });
        return $categories;
    }
}
