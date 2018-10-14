<?php

namespace App\Http\Controllers\Auth;

use App\Services\UserService;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Request;


class IndexController extends Controller
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

    // 登陆
    public function index()
    {
        return view('index.login');
    }

    // 登陆操作
    public function landingOperation(Request $request)
    {
        $name = Request::post();
        $userService = new UserService;
        $result = $userService->landing($name);
        switch ($result) {
            case '2':
                return redirect('shop/index');//手机号登陆成功
                break;
            case '3':
                return redirect('shop/index');//邮箱登陆成功
                break;
            default:
                return redirect("/");//登陆失败
                break;
        }
    }

   
    // 注册
    public function register()
    {
        return view('index.register');
    }

    // 注册操作
    public function registerOperation(Request $request)
    {
        // 验证传递的数据 Validata

        // 调用services层的方法

        // 根据services层的方法的返回值执行相应操作
        $name = Request::post();
        $userService = new UserService;
        $result = $userService->register($name);
        // print_r($result);die;
        switch ($result) {
            case '1':
                return redirect('shop/index');//注册成功
                break;
            case '2':
                return view('index.register');//数据库里已存在该手机号
                break;
            case '3':
                return view('index.register');//数据库里已存在该邮箱
                break;
            case '4':
                return view('index.register');//确认密码和密码不一致，请重新输入
                break;
            default :
                return view('index.register');//注册失败
                break;
            
        }

    }

}
