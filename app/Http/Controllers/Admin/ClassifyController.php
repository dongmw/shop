<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdCategory;

class ClassifyController extends Controller
{
    function index()
    {
        $ad_categories = AdCategory::all();
        //return $ad_categories;
        return view('admin.ad_category.index')
            ->with('ad_categories', $ad_categories);
    }
    function create()
    {
        return view('admin.ad_category.create');

    }
    function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:brands|max:255',
            'sort_order' => 'required|integer|between:0,99',
        ]);
        AdCategory::create($request->all());
        return redirect(route('ad_category.index'))->with('notice', '新增成功');

    }
    function edit()
    {

    }
    function update()
    {

    }
    function destroy()
    {

    }

}
