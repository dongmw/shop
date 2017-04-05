<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    function category()
    {
        $categories = Category::with('children')->where('parent_id','0')->get();
        return view('wechat.products.category')->with('categories',$categories);
    }

    function index(Request $request)
    {
//        $where = function ($query) use ($request) {
//            if ($request->has('category_id') and $request->category_id != '') {
//                $query->where('category_id', $request->category_id);
//            }
//
//            if ($request->has('searchword')) {
//                if ($request->has('searchword') and $request->searchword != '') {
//                    $search = "%" . $request->searchword . "%";
//                    $query->where('name', 'like', $search);
//                }
//            }
//        };
//
//        $products = Product::where($where)->get();

        $categories = Category::with('products')->where('id',$request->category_id)->first();
        //return $categories;
        return view('wechat.products.index')->with('categories', $categories);
    }

    function show($id)
    {
        $product = Product::find($id);
        //return $product;
        return view('wechat.products.show')->with('product',$product);
    }
}
