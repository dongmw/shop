<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Cache;

class CategoryController extends Controller
{
    function __construct()
    {
        view()->share([
            '_system' => 'shop',
            'categories' => Category::get_categories(),
            '_product_category' => 'am-active',
            '_title' => '商品分类-'
        ]);
    }

    function index()
    {
        $categories = Category::with('children')->where('parent_id', '0')->get();
        //return $categories;
        return view('admin.product_category.index');
//            ->with('categories', $categories);
    }
    function create()
    {
        $categories = Category::all()->where('parent_id', '0');
        //return $categories;
        Cache::forget('Shop_category_categories');
        return view('admin.product_category.create')->with('categories', $categories);
    }
    function store(Request $request)
    {
        Category::create($request->all());
        Cache::forget('Shop_category_categories');
        return redirect(route('product_category.index'))
            ->with('notice','新增成功');

    }
    function edit($id)
    {
        $categories = Category::where('parent_id', '0')->get();
        //return $categories;
        $category = Category::find($id);
        //return $category;
        Cache::forget('Shop_category_categories');
        return view('admin.product_category.edit')
            ->with('category',$category)
            ->with('categories', $categories);
    }
    function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category -> update($request->all());
        Cache::forget('Shop_category_categories');
        return redirect(route('product_category.index'))
            ->with('notice','编辑成功');

    }
    function destroy($id)
    {
        if (!Category::check_children($id)){
            return back()->with('alert','该栏目下有子栏目，请先删除子栏目才可以删除此栏目');
        }else{
            Category::destroy($id);
            return back()->with('notice','删除成功');
        }

        /**
         * 不带模型的方法
         */
        //        $categories = Category::where('parent_id', $id)->get();
//        //return $categories;
//        if ($categories->first()){
//            return redirect(route('product_category.index'))->with('notice','必须先删除该子栏目');
//        }else{
//            Category::destroy($id);
//            return redirect(route('product_category.index'))
//                ->with('notice', '删除成功');
//        }

    }
    function sort_order(Request $request)
    {
        $category = Category::find($request->id);
        $category->sort_order = $request->sort_order;
        $category->save();
        Cache::forget('Shop_category_categories');
    }
    function is_something(Request $request)
    {
        $category = Category::find($request->id);
        $category->is_show = !$category->is_show;
        $category->save();
        Cache::forget('Shop_category_categories');
    }
}
