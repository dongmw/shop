<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Product;


class IndexController extends Controller
{
    function index()
    {
        //dump(session('wechat.oauth_user.original'));
        $index_ads = Ad::where('ad_category_id','1')->get();
        $banner_ads = Ad::where('ad_category_id','2')->get();
        $products = Product::all();
        return view('wechat/index')->with(compact('index_ads','banner_ads','products'));
    }
}
