<?php
Route::group(['prefix'=>'shop'],function (){
    //产品分类的排序和样式
    Route::group(['prefix'=>'product_category'],function (){
        Route::patch('sort_order','CategoryController@sort_order')->name('product_category.sort_order');
        Route::patch('is_something', 'CategoryController@is_something');
    });
    //品牌的排序和样式
    Route::group(['prefix'=>'brands'],function (){
       Route::patch('sort_order','BrandController@sort_order')->name('brands.sort_order');
       Route::patch('is_something', 'BrandController@is_something');
    });
    //商品的样式、回收站
    Route::group(['prefix'=>'product'],function (){
        Route::patch('it_something', 'ProductController@it_something');
        Route::get('recycle','ProductController@recycle')->name('product.recycle');
        Route::get('{product}/restore','ProductController@restore')->name('product.restore');
        Route::delete('{product}/force_destroy','ProductController@force_destroy')->name('product.force_destroy');
    });
    Route::resource('product', 'ProductController');
    Route::resource('brands', 'BrandController');
    Route::resource('product_category','CategoryController');
});