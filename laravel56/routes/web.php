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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::group(['middleware' => ['web']], function () {


	// 根目录-登陆
	Route::get("/", "Auth\IndexController@index");
	// 登陆的操作
	Route::post('index/landingOperation','Auth\IndexController@landingOperation');
	// 登陆的验证
	Route::post('index/userNameVerification','Auth\IndexController@userNameVerification');
	Route::post('index/mobilePhoneNumberVerification','Auth\IndexController@mobilePhoneNumberVerification');
	Route::post('index/mailboxVerification','Auth\IndexController@mailboxVerification');
	Route::post('index/passwordAuthentification','Auth\IndexController@passwordAuthentification');


	// 注册
	Route::get('index/register','Auth\IndexController@register');
	// 注册的操作
	Route::post('index/registerOperation','Auth\IndexController@registerOperation');
	// 展示
	Route::get('shop/index','Auth\ShopController@index');
	// 列表
	Route::get('shop/liebiao','Auth\ShopController@liebiao');
	// 详情
	Route::get('shop/xiangqing','Auth\ShopController@xiangqing');
	// 购物车
	Route::get('shop/gouwuche','Auth\ShopController@gouwuche');
	// 订单
	Route::any('shop/dingdanzhongxin','Auth\ShopController@dingdanzhongxin');


Route::get('a/a', function () {
    return view('index/welcome');
});
});

