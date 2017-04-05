<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Address;
use App\Models\Order;
use DB;

class OrderController extends Controller
{
    function checkout(Request $request)
    {
        $carts = Cart::with('product')->where('customer_id', $request->customer_id)->get();

        $count = Cart::count_cart($carts);

        $customer = Customer::find($request->customer_id);
        $address = Address::find($customer->address_id);

        return compact('carts', 'count', 'address');
    }

    //生成订单
    function store(Request $request)
    {
        $count = Cart::count_cart();
        $total_price = $count['total_price'];
        $data = [];

        DB::beginTransaction();
        try {
            //生成订单
            $order = Order::create([
                'customer_id' => $request->customer_id,
                'total_price' => $total_price,
                'status' => 1
            ]);

            //订单地址
            $address = Address::find($request->address_id);
            $order->address()->create([
                'province' => $address['province'],
                'city' => $address['city'],
                'area' => $address['area'],
                'detail' => $address['detail'],
                'name' => $address['name'],
                'tel' => $address['tel'],
            ]);

            $carts = Cart::with('product')->where('customer_id', $request->customer_id)->get();
            foreach ($carts as $cart) {
                //判断库存是否足够
                if ($cart->product->stock != '-1' and $cart->product->stock - $cart->num < 0) {
                    throw new \Exception('商品' . $cart->product->name . ", 目前仅剩下" . $cart->product->stock . " 件. \n请返回购物车, 修改订单后再下单!");
                }

                //削减库存数量
                if ($cart->product->stock != '-1') {
                    $cart->product->decrement('stock', $cart->num);
                }

                //插入订单商品表
                $order->order_products()->create([
                    'product_id' => $cart->product_id,
                    'num' => $cart->num
                ]);
            }

            //清空购物车
            Cart::with('product')->where('customer_id', $request->customer_id)->delete();

        } catch (\Exception $e) {
//            echo $e->getMessage();

            DB::rollback();
            $data['status'] = 0;
            $data['info'] = $e->getMessage();
            return $data;
        }
        DB::commit();

        $data['status'] = 1;
        $data['order_id'] = $order->id;
        return $data;
    }
}
