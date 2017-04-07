<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Auth::routes();

    Route::group(['namespace' => 'Admin','middleware' => ['auth']], function () {

        //系统设置
        require ('admin/system.php');

        //商品管理.分类
        require ('admin/shop.php');

        //广告管理.分类
        require ('admin/ad.php');

        //微信自定义菜单管理
        require ('admin/wechat.php');

    });
});

Route::get('/home', 'HomeController@index');
//'middleware' => 'wechat.oauth'
Route::group(['namespace' => 'Wechat','middleware' => 'wechat.oauth'], function () {
    //系统设置
    require ('wechat/shop.php');


});


