<?php

namespace App\Http\Controllers\Admin;

use App\Models\ProductGallery;
use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;



class ProductController extends Controller
{
    public function __construct()
    {

        view()->share([
            '_system' => 'shop',
            '_product' => 'am-active',
            '_title' => '商品管理-'
        ]);
    }

    private function attributes()
    {
        view()->share([
            'categories' => Category::get_categories(),
            'brands' => Brand::orderBy('sort_order')->get(),
            'filter_categories' => Category::filter_categories()
        ]);
    }

    function index()
    {
        $products = Product::with('categories')
            ->with('brand')
            ->orderBy('stick','desc')
            ->orderBy('created_at','desc')
            ->get();
        //return $products;
        $this->attributes();
        return view('admin.product.index')
            ->with('products', $products);
    }
    function create()
    {
        $categories = Category::with('children')->where('parent_id', '0')->get();
        $brands = Brand::all();
        return view('admin.product.create')
            ->with('categories',$categories)
            ->with('brands', $brands);
    }
    function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
        ]);
        //return $request->all();
        $product = Product::create(collect($request)->forget(['category_id','imgs', 'file'])->all());

        //相册
        if ($request->has('imgs')) {
            foreach ($request->imgs as $img) {
                $product->product_galleries()->create(['img' => $img]);
            }
        }

        //商品所属栏目
        $product->categories()->sync($request->category_id);
        return back()->with('notice', '新增成功~');


    }
    function edit($id)
    {
        $product = Product::with('categories','brand','product_galleries')->find($id);
        $this->attributes();
        $p_categories = $product->categories->pluck('id');
        //return $p_categories;
        //return $product;
        return view('admin.product.edit')
            ->with('product', $product)
            ->with('p_categories',$p_categories);

    }
    function update(Request $request,$id)
    {
        $this->validate($request, [
            'category_id' => 'required',
        ]);
        $product = Product::find($id);

        $product->categories()->sync($request->category_id);
        $product->update(collect($request)->forget(['category_id', 'imgs', 'file'])->all());

        if ($request->has('imgs')){
            foreach ($request->imgs as $img){
                $product->product_galleries()->create(['img' => $img]);
            }
        }
        return redirect(route('product.index'))->with('notice','修改成功~');

    }
    function destroy($id)
    {
        Product::destroy($id);
        return back()->with('你删除的商品已经放入回收站~');

    }
    function force_destroy($id)
    {
        Product::withTrashed()->where('id',$id)->forceDelete();
        ProductGallery::where('product_id',$id)->delete();
        return redirect(route('product.index'))->with('notice','彻底删除成功~');
    }
    function recycle()
    {
        $products = Product::with('categories')->with('brand')->onlyTrashed()->get();
        //return $products;
        return view('admin.product.recycle')
            ->with('products',$products);
    }
    function restore($id)
    {
        Product::withTrashed()->where('id',$id)->restore();
        return redirect(route('product.index'))->with('notice','还原成功~');

    }
    function it_something(Request $request)
    {
        $attr = $request->attr;
        $product = Product::find($request->id);
        $value = $product->$attr ? false : true;
        $product->$attr = $value;
        $product->save();
    }
}
