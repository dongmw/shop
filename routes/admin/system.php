<?php
Route::get('/', 'IndexController@index');
Route::post('upload', 'ImageController@upload');
//系统设置
Route::group(['prefix'=>'system'],function (){
    //站点信息
    Route::get('config','SystemController@config');
    //put可以修改多个字段
    Route::put('config','SystemController@config_update');
    //密码修改
    Route::get('password','SystemController@password');
    //patch修改一个字段
    Route::patch('password','SystemController@password_update');
    //会员中心
    Route::get('customer','SystemController@member')->name('system.member');

});