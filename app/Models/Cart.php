<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**计算购物车商品的总数和价格
     * @param null $carts
     * @return array
     */
    static function count_cart($carts = null)
    {
        $count = [];
        //避免重复查询
        $carts = $carts ? $carts : Cart::with('product')->where('customer_id',session('wechat.customer.id'))->get();
        $total_price = 0;
        $num = 0;
        foreach ($carts as $v){
            $total_price += $v->product->price * $v->num;
            $num += $v->num;
        }
        $count['total_price'] = $total_price;
        $count['num'] = $num;
        return $count;
    }

    static function refresh_cart($customer_id)
    {
        $carts = Cart::with('product')->where('customer_id',$customer_id)->get();
        return [
            'carts' => $carts,
            'count' => self::count_cart($carts)
        ];
    }
}
