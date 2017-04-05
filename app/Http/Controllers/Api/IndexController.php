<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\AdCategory;
use App\Models\Product;

class IndexController extends Controller
{
    function index()
    {
        $index_ads = Ad::where('ad_category_id','1')->get();
        $banner_ads = Ad::where('ad_category_id','2')->get();
        $products = Product::all();
        return compact('index_ads','banner_ads','products');
    }
}
