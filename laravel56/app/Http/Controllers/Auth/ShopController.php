<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\Services\ShopService;
use Illuminate\Support\Facades\DB;
use Request;

class ShopController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    // 首页的展示
    public function index()
    {
        error_reporting( E_ALL&~E_NOTICE );
        // 取session里的值
        $session = session('name');
        $name = $session[0];
        // print_r($name); die;
        $shop = new ShopService;
        $commodityType = $shop->ShopType();
        // print_r($arr);
        // die;
        $array = array();
        foreach ($commodityType as $key => $value) {
            $array[$key] = $value;
        }

        $xiaomiStarItems = $shop->XiaomiStarItems('shop_type','小米明星单品');

        // print_r($xiaomiStarItems);die;

        return view('shop.index',['array' => $array],['xiaomiStarItems' => $xiaomiStarItems]);
        
        // die;


        // // print_r($request->cookie('u_id'));die;
        // $res = DB::table('shop')->where('shop_type', '小米明星单品')->get();
        // $res_pei1 = DB::table('shop')->where('shop_type', '配件1')->get();
        // $res_pei2 = DB::table('shop')->where('shop_type', '配件2')->get();
        // // print_r($res);die;
        // return view('shop.index',['type' => $commodityType],['res' => $res],['res_pei1' => $res_pei1,'res_pei2' => $res_pei2]);
    }
    
    // 小米手机的列表
    public function liebiao()
    {
        $res1 = DB::table('millet')->where('millet_type', 1)->get();
        $res2 = DB::table('millet')->where('millet_type', 2)->get();
        // print_r($res1);die;
        return view('shop.liebiao',['res1' => $res1],['res2' => $res2]);
    }
    // 详情
    public function xiangqing()
    {
        // echo 1111;die;
        return view('shop.xiangqing');
    }
    // 购物车
    public function gouwuche()
    {
       return view('shop.gouwuche');
    }
    // 订单中心
    public function dingdanzhongxin()
    {
        return view('shop.dingdanzhongxin');
    }



}