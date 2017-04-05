<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{
    function index(Request $request)
    {
        $where = function ($query) use ($request) {
            if ($request->has('keyword') and $request->keyword != '') {
                $search = "%" . $request->keyword . "%";
                $query->where('name', 'like', $search);
            }
        };

        $brands = Brand::where($where)
            ->orderBy('sort_order')
            ->paginate(config('shop.page_size'));

        return view('admin.shop.index')->with('brands', $brands);
    }

    function create()
    {
        return view('admin.shop.create');
    }
    function store(Request $request)
    {
        //return $request;出现乱码
        $this->validate($request,[
            'name' => 'required|unique:brands|max:255',
            'url' => 'required|url|max:255',
            'sort_order' => 'required|integer|between:0,99',
        ]);
        Brand::create($request->all());
        return redirect(route('brands.index'))->with('notice', '新增成功');
    }
    function edit($id)
    {
        $brand = Brand::find($id);
        //return $brand;
        return view('admin.shop.edit')->with('brand',$brand);
    }
    function update(Request $request,$id)
    {
        //return $request;
        $this->validate($request,[
            'name' => 'required|max:255',
            'url' => 'required|url|max:255',
            'sort_order' => 'required|integer|between:0,99',
        ]);
        $brand = Brand::find($id);
        $brand -> update($request->all());
        return redirect(route('brands.index'))->with('notice', '编辑成功');
    }
    function destroy($id)
    {
        Brand::destroy($id);
        return redirect(route('brands.index'))->with('notice', '删除成功');
    }
    function sort_order(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->sort_order = $request->sort_order;
        $brand->save();
    }
    function is_something(Request $request)
    {
        $brand = Brand::find($request->id);
        $brand->is_show = !$brand->is_show;
        $brand->save();

    }
}
