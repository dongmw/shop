<?php
    //微信自定义菜单
    Route::group(['prefix' => 'wechat'], function () {
        Route::get('edit', 'WechatController@edit')->name('wechat.edit');
        Route::put('update', 'WechatController@update')->name('wechat.update');
        Route::delete('destroy', 'WechatController@destroy')->name('wechat.destroy');
        Route::get('index', 'WechatController@index')->name('wechat.index');
        Route::post('store', 'WechatController@store')->name('wechat.store');
        Route::get('create', 'WechatController@create')->name('wechat.create');

    });
