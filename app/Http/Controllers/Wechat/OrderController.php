<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Address;
use DB;
use Log;
use EasyWeChat;
use App\Models\Order;
use App\Models\OrderAddress;
use App\Models\OrderProduct;

class OrderController extends Controller
{
    function __construct()
    {
        view()->share('_customer', 'on');
    }

    function checkout()
    {
        $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
        //dump($carts);
        $count = Cart::count_cart($carts);
        //dump($count);
        $customer = Customer::find(session('wechat.customer.id'));
        //dump($customer);
        $address = Address::find($customer->address_id);
        //dump($address);

        return view('wechat.order.checkout')
            ->with('carts', $carts)
            ->with('count', $count)
            ->with('address', $address);
    }

    function store(Request $request)
    {
        $count = Cart::count_cart();
        $total_price = $count['total_price'];
        $data = [];

        DB::beginTransaction();
        try {
            //生成订单
            $order = Order::create([
                'customer_id' => session('wechat.customer.id'),
                'total_price' => $total_price,
                'status' => 1
            ]);

            //订单地址
            $address = Address::find($request->address_id);
            OrderAddress::create([
                'province' => $address['province'],
                'city' => $address['city'],
                'area' => $address['area'],
                'detail' => $address['detail'],
                'name' => $address['name'],
                'tel' => $address['tel'],
            ]);

            $carts = Cart::with('product')->where('customer_id', session('wechat.customer.id'))->get();
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
                OrderProduct::create([
                    'product_id' => $cart->product_id,
                    'num' => $cart->num
                ]);
            }

            //清空购物车
            Cart::with('product')->where('customer_id', session('wechat.customer.id'))->delete();

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

    function show_pay($id)
    {
        return view('wechat.order.show_pay');
    }


}
