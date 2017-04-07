<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//
Route::get('/user', function () {
    //做完在加auth:api
})->middleware('auth:api');

Route::group(['namespace' => 'Api'], function(){
    Route::any('wechat', 'WechatController@serve');
});

//接口路由
Route::group(['namespace' => 'Api','middleware' => ['cors']], function () {
    Route::get('/', 'IndexController@index');
    Route::get('category','CategoryController@index');
    Route::get('list/{id}','ProductController@index');
    Route::get('show/{id}','ProductController@show');
    //用户注册
    Route::post('customer/register','CustomerController@register');
    Route::post('customer/login','CustomerController@login');
    Route::post('customer/check_token','CustomerController@check_token');
    //购物车
    Route::resource('cart','CartController');
    //购物车商品数量的+ -
    Route::post('cart/change_num','CartController@change_num');
    //收货地址
    Route::get('address','AddressController@index');
    Route::patch('address/default_address','AddressController@default_address');
    Route::post('address/store','AddressController@store');
    //订单
    Route::get('order/checkout', 'OrderController@checkout');
    Route::post('order/store', 'OrderController@store');
    //后台图标
    Route::get('sex_kind','EchartController@sex_kind');
    Route::get('map','EchartController@map');

});

