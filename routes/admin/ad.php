<?php
//广告中心的资源路由
Route::group(['prefix'=>'shop'],function () {
    //广告
    Route::resource('ad', 'AdController');
    //广告分类
    Route::resource('ad_category','ClassifyController');
});