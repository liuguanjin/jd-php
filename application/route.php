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
    //根目录
    Route::get('/','adminapi/index/index');
    //查看验证码接口
    Route::get('captcha/:id',"\\think\\captcha\\CaptchaController@index");
    //获取验证码接口
    Route::get('captcha','adminapi/login/captcha');
    //前台登录接口
    Route::post('homelogin','adminapi/login/homeLogin');
    //前台注册接口
    Route::post('homeregister','adminapi/login/homeRegister');
    //前台退出接口
    Route::get('homelogout','adminapi/login/homeLogout');
    //后台登录接口
    Route::post('adminlogin','adminapi/login/adminLogin');
    //后台退出接口
    Route::get('adminlogout','adminapi/login/adminLogout');
    //获取后台导航接口
    Route::get('nav','adminapi/auth/nav');
   //获取所有角色接口
    Route::get('allrole','adminapi/role/getAllRole');
    //获取所有品牌接口
    Route::get('allbrands','adminapi/brand/getAllBrand');
    //获取模型下的规格接口
    Route::get('specs','adminapi/type/getSpec');
    //获取模型下的规格值接口
    Route::get('specvalues','adminapi/type/getSpecvalue');
    //获取模型下的属性接口
    Route::get('attrs','adminapi/type/getAttr');
    //获取所有管理员接口
    Route::get('alladmin','adminapi/admin/allAdmin');
    //获取店铺下售出的宝贝接口
    Route::get('soldgoods','adminapi/MyShop/soldGoods');
    //获取店铺下所有宝贝接口
    Route::get('mygoods','adminapi/MyShop/myGoods');
    //获取店铺下未发货宝贝接口
    Route::get('nosendgoods','adminapi/MyShop/nosend');
    //获取店铺下所有评论接口
    Route::get('evaluate','adminapi/MyShop/myEvaluate');
    //店铺下发货接口
    Route::post('sendgoods/:id','adminapi/MyShop/sendgoods');
    //权限增删改查接口
    Route::resource('auths','adminapi/auth',[],['id' => '\d+']);
    //管理员增删改查接口
    Route::resource('admins','adminapi/admin',[],['id' => '\d+']);
    //角色增删改查接口
    Route::resource('roles','adminapi/role',[],['id' => '\d+']);
    //分类增删改查接口
    Route::resource('categorys','adminapi/category',[],['id' => '\d+']);
    //品牌增删改查接口
    Route::resource('brands','adminapi/brand',[],['id' => '\d+']);
    //模型增删改查接口
    Route::resource('types','adminapi/type',[],['id' => '\d+']);
    //商品增删改查接口
    Route::resource('goods','adminapi/goods',[],['id' => '\d+']);
    //属性增删改查接口
    Route::resource('attr','adminapi/attr',[],['id' => '\d+']);
    //规格增删改查接口
    Route::resource('spec','adminapi/spec',[],['id' => '\d+']);
    //店铺增删改查接口
    Route::resource('store','adminapi/shop',[],['id' => '\d+']);
    //单图片上传接口
    Route::post('logo','adminapi/upload/logo');
    //多图片上传接口
    Route::post('images','adminapi/upload/images');
});

//前台接口
//获取商品 分页接口
Route::get('goods','homeapi/goods/index');
//商品详情接口
Route::get('goodsdetail/:id','homeapi/goods/detail');
//店铺详情接口
Route::get('shopdetail/:id','homeapi/shop/detail');
//获取购物车数据接口
Route::get('cart/:id','homeapi/cart/read');
//获取收藏夹数据接口
Route::get('collect/:id','homeapi/collect/read');
//获取足迹数据接口
Route::get('footprint/:id','homeapi/footprint/read');
//购物车详情接口 获取购物车中的商品信息
Route::post('cart','homeapi/cart/index');
//收藏夹详情接口 获取收藏夹中的商品信息
Route::post('collect','homeapi/collect/index');
//足迹详情接口 获取足迹中的商品信息
Route::post('footprint','homeapi/footprint/index');
//更改购物车接口
Route::put('cart/:id','homeapi/cart/update');
//更改收藏夹接口
Route::put('collect/:id','homeapi/collect/update');
//更改足迹接口
Route::put('footprint/:id','homeapi/footprint/update');
//获取分类接口
Route::get('category','homeapi/category/read');
//获取省份接口
Route::get('province','homeapi/position/province');
//获取城市接口
Route::get('city','homeapi/position/city');
//获取县区接口
Route::get('county','homeapi/position/county');
//获取城镇接口
Route::get('town','homeapi/position/town');
//获取社区接口
Route::get('village','homeapi/position/village');
//收货地址增删改查接口
Route::resource('address','homeapi/address',[],['id' => '\d+']);
//结算界面中的商品数据
Route::post('balancegoods','homeapi/goods/balanceGoods');
//订单增删改查接口
Route::resource('order','homeapi/order',[],['id' => '\d+']);
//获取分类性情接口
Route::get('category-detail/:id','homeapi/category/categoryDetail');
//获取收藏商铺接口 商铺的id集合
Route::get('collect-shop','homeapi/CollectShop/index');
//获取收藏商铺数据接口 详细商品信息
Route::post('collect-shop-detail','homeapi/CollectShop/collectShopDetail');
//更新收藏商铺数据接口
Route::put('collect-shop/:id','homeapi/CollectShop/update');
//获取评论的商品详情接口
Route::get('evaluate-goods/:id','homeapi/Order/orderGoods');
//前台的多图片上传接口
Route::post('images','homeapi/upload/images');
//评论接口
Route::post('evaluate/:id','homeapi/evaluate/save');
Route::post('alipay','homeapi/alipay/pay');
