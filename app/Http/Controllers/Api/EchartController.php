<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;

class EchartController extends Controller
{
    function sex_kind()
    {
        $male = Customer::where('sex',1)->count();
        $female = Customer::where('sex',2)->count();
        return compact('male','female');
    }

    function map()
    {
        $users = Customer::select('province as name', \DB::raw('count(province) as value'))
            ->groupBy('province')
            ->get();
        return $users;

//        $result = [];
//        foreach ($users as $key=>$value){
//            $result[$key]['name'] = $value['province'];
//            $result[$key]['value'] = $value['total_num'];
//        }
//        return $result;
    }
}
