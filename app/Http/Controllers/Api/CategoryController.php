<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    function index()
    {
        $categories = Category::with('children')->where('parent_id','0')->get();
        return $categories;
    }
}
