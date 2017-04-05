<?php

namespace App\Http\Controllers\Wechat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;

class CartController extends Controller
{
    function index()
    {
        //dump(session('wechat.customer'));
        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
        //return $carts;
        return view('wechat.cart.index')
            ->with('carts', $carts)
            ->with('count', Cart::count_cart($carts));
    }

    function store(Request $request)
    {
        //判断购物车是否有当前商品,如果有,那么 num +1
        $product_id = $request->product_id;
        $cart = Cart::where('product_id', $product_id)->where('customer_id', session('wechat.customer.id'))->first();

        if ($cart) {
            Cart::where('id', $cart->id)->increment('num');
            return;
        }

        //否则购物车表,创建新数据
        Cart::create([
            'product_id' => $request->product_id,
            'customer_id' => session('wechat.customer.id'),
        ]);
    }

    function destroy(Request $request)
    {
        $id = $request->id;
        //return $id;
        Cart::destroy($id);
        return Cart::count_cart();

    }

    function change_num(Request $request)
    {
        if($request->type == 'add'){
            Cart::where('id',$request->id)->increment('num');
        }elseif ($request->type == 'sub'){
            Cart::where('id',$request->id)->decrement('num');
        }
        return Cart::count_cart();
    }
}
