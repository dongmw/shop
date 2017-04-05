<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdCategory;
use App\Models\Ad;

class AdController extends Controller
{
    function index()
    {
        $ads = Ad::with('AdCategory')->with('Image')->get();
        //return $ads;
        return view('admin.ad.index')
            ->with('ads', $ads);
    }

    function create()
    {
        $ad_categories = AdCategory::all();
        return view('admin.ad.create')
            ->with('ad_categories', $ad_categories);
    }
    function store(Request $request)
    {
        //return $request->all();
        $this->validate($request,[
            'name' => 'required|unique:brands|max:255',
            'url' => 'required|url|max:255',
            'sort_order' => 'required|integer|between:0,99',
        ]);
        $ads = Ad::create($request->all());

        return redirect(route('ad.index'))->with('notice', '新增成功');
    }

    function  edit($id)
    {
        //$ad_categories
        $ad = Ad::with('image')->find($id);
        //return $ad;
        return view('admin.ad.edit')
            ->with('ad',$ad);
    }

    function update(Request $request,$id)
    {
        $ad = Ad::find($id);
        $ad -> update($request->all());
        return redirect(route());

    }

    function destroy($id)
    {

    }
}
