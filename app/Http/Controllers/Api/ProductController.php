<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    function index($id)
    {
        //return $request->category_id;
        //$id = $request->category_id;
        //return $id;

        $categories = Category::with('products')->where('id',$id)->first();
        return $categories;

    }

    function show($id)
    {
        $product = Product::find($id);
        return $product;
    }
}
