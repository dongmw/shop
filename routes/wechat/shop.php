<?php
/**
 * 微信商城
 */
    //用户授权
    Route::get('/','IndexController@index');

    Route::group(['prefix' => 'product'], function () {
        //商品分类
        Route::get('category', 'ProductController@category');

        //商品详情
        Route::get('{id}', 'ProductController@show');

        //商品列表
        Route::get('/', 'ProductController@index');
    });

    Route::group(['prefix' => 'cart'],function (){
        Route::post('/','CartController@store');
        Route::get('/','CartController@index');
        Route::delete('/','CartController@destroy');
        Route::patch('/','CartController@change_num');
    });
    Route::group(['prefix' => 'order'],function (){
        //下单
        Route::get('checkout','OrderController@checkout');
        //生成订单、支付
        Route::post('/','OrderController@store');
        Route::get('pay/{id}','OrderController@show_pay');

    });

    Route::group(['prefix' => 'address'],function (){
        //地址首页
        Route::get('index','AddressController@index');
        //改变默认地址
        Route::patch('index', 'AddressController@default_address');
    });

    Route::group(['prefix' => 'lottery'],function (){
        //大转盘首页
        Route::get('index','LotteryController@index');
        Route::post('do_lottery','LotteryController@do_lottery');
    });
