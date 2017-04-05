<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Customer;

class AddressController extends Controller
{
    function index()
    {
        $addresses = Address::where('customer_id', session('wechat.customer.id'))->get();
        //return $addresses;
        return view('wechat.address.index')->with('addresses', $addresses);
    }

    function default_address(Request $request)
    {
        Customer::where('id', session('wechat.customer.id'))->update(['address_id' => $request->address_id]);

        //重新设置session
        $customer = session()->get('customer');
        $customer['address_id'] = $request->address_id;
        session()->put('customer', $customer);
    }
}
