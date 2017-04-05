<?php

namespace App\Http\Controllers\Api;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class AddressController extends Controller
{
    function index(Request $request)
    {
        $addresses = Address::where('customer_id', $request->customer_id)->get();
        foreach ($addresses as &$address) {
            $tel = substr_replace($address->tel, '*****', 3, 4);
            $address['tel'] = $tel;
        }
        return $addresses;
    }
    function default_address(Request $request)
    {
        Customer::where('id', $request->customer_id)->update(['address_id' => $request->address_id]);
    }
    function store(Request $request)
    {
        //return $request->all();
        $address = new Address();
        $address->customer_id = $request->customer_id;
        $address->name = $request->name;
        $address->province = $request->province;
        $address->city = $request->city;
        $address->area = $request->area;
        $address->detail = $request->detail;
        $address->tel = $request->tel;
        $address->save();
    }
}
