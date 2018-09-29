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


Route::get("/", "Auth\IndexController@index");

Route::get('hello', function () {
    return view('hello');
});
Route::post('index/index_do','Auth\IndexController@index_do');
Route::get('index/register','Auth\IndexController@register');

Route::post('shop/index','Auth\ShopController@index');

