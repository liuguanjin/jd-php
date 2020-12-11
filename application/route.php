<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

use \think\Route;
//后台接口
Route::domain('adminapi',function(){
    Route::get('/','adminapi/index/index');
    Route::get('captcha/:id',"\\think\\captcha\\CaptchaController@index");
    Route::get('captcha','adminapi/login/captcha');
    Route::post('homelogin','adminapi/login/homeLogin');
    Route::post('homeregister','adminapi/login/homeRegister');
    Route::get('homelogout','adminapi/login/homeLogout');
    Route::post('adminlogin','adminapi/login/adminLogin');
    Route::get('adminlogout','adminapi/login/adminLogout');
    Route::get('nav','adminapi/auth/nav');
    Route::get('allrole','adminapi/role/getAllRole');
    Route::get('allbrands','adminapi/brand/getAllBrand');
    Route::get('specs','adminapi/type/getSpec');
    Route::get('specvalues','adminapi/type/getSpecvalue');
    Route::get('attrs','adminapi/type/getAttr');
    Route::resource('auths','adminapi/auth',[],['id' => '\d+']);
    Route::resource('admins','adminapi/admin',[],['id' => '\d+']);
    Route::resource('roles','adminapi/role',[],['id' => '\d+']);
    Route::resource('categorys','adminapi/category',[],['id' => '\d+']);
    Route::resource('brands','adminapi/brand',[],['id' => '\d+']);
    Route::resource('types','adminapi/type',[],['id' => '\d+']);
    Route::resource('goods','adminapi/goods',[],['id' => '\d+']);
    Route::resource('attr','adminapi/attr',[],['id' => '\d+']);
    Route::resource('spec','adminapi/spec',[],['id' => '\d+']);
    Route::resource('store','adminapi/shop',[],['id' => '\d+']);
    Route::post('logo','adminapi/upload/logo');
    Route::post('images','adminapi/upload/images');
});

//前台接口
Route::get('goods','homeapi/goods/index');
Route::get('goodsdetail/:id','homeapi/goods/detail');
Route::get('shopdetail/:id','homeapi/shop/detail');
Route::get('cart/:id','homeapi/cart/read');
Route::get('collect/:id','homeapi/collect/read');
Route::get('footprint/:id','homeapi/footprint/read');
Route::post('cart','homeapi/cart/index');
Route::post('collect','homeapi/collect/index');
Route::post('footprint','homeapi/footprint/index');
Route::put('cart/:id','homeapi/cart/update');
Route::put('collect/:id','homeapi/collect/update');
Route::put('footprint/:id','homeapi/footprint/update');
Route::get('category/:id','homeapi/category/read');
Route::get('province','homeapi/position/province');
Route::get('city','homeapi/position/city');
Route::get('county','homeapi/position/county');
Route::get('town','homeapi/position/town');
Route::get('village','homeapi/position/village');
Route::resource('address','homeapi/address',[],['id' => '\d+']);
Route::post('balancegoods','homeapi/goods/balanceGoods');
