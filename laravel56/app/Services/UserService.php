<?php
namespace App\Services;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\job;

class UserService extends Controller
{
	// 注册
	public function register($request)
	{
		// 验证手机号唯一性，如果已存在返回状态码

		// 验证邮箱唯一性，如果已存在返回状态码

		// 处理注册数据
		// $data['name'] = $request->name;
		// $data['password'] = md5($request->password);

		// $userObject = new User;
		// $result = $userObject->add($data);

		// 判断是否有邮箱有的话发送邮件

		// 设置登录状态

		$data['username'] = $request['username'];
		$data['password'] = md5($request['password']);
		$data['mobile'] = $request['mobile'];
		$data['mail'] = $request['mail'];
		$data['time'] = date("Y-m-d H:i:s",time());

		$confirmpassword = $request['confirmpassword'];//confirmpassword  确认密码
		if ($data['password'] == $confirmpassword) {
			return 4; //4：确认密码与密码不一致
		}
		// print_r($data);die;
		$userObject = new User;//userObject  用户对象
		$mobile = $userObject->select('mobile',$data['mobile']);
		if (count($mobile) != 0) {
			return 2; //2：数据库里已存在该手机号
		}
		$mail = $userObject->select('mail',$data['mail']);
		if (count($mail) != 0) {
			return 3; //3：数据库里已存在该邮箱
		}
			// echo "1111";die;
		$isSuccessful = $userObject->inser($data);//添加用户信息
		if ($isSuccessful) {
			$mail = $request['mail'];
			// $this->dispatch(new job($mail));
			$getCurrentData = $userObject->select('mobile',$data['mobile']);//查询用户存入数据库的信息
			$id = $getCurrentData[0]->u_id;//获取用户存入数据库的id
			$changeStatus = $userObject->amend($id,$data['time']);//改变用户的登陆状态
			if ($changeStatus) {
				session(['name'=>$getCurrentData]);//将用户信息存入session
				// return $id;
				return 1;
			}
			
		}

	}

	// 登陆
	public function  landing($user)// landing  登陆
	{
		$data['username_a'] = $user['username_a'];
		$data['password'] = md5($user['password']);
		$userObject = new User;//userObject  用户对象
		// 判断是否是手机号登陆
		$mobile = $userObject->landingelect('mobile',$data);
		if (count($mobile) == 1) {
			$u_id = $mobile[0]->u_id;
			session(['name'=>$mobile]);
			$time = date("Y-m-d H:i:s",time());
			$userObject->amend($u_id,$time);
			return 2;//手机号登陆
		}
		$mail = $userObject->landingelect('mail',$data);
		if (count($mail) == 1) {
			$u_id = $mail[0]->u_id;
			session(['name'=>$mobile]);
			$time = date("Y-m-d H:i:s",time());
			$userObject->amend($u_id,$time);
			return 3;//邮箱登陆
		}
		return 0;//手机号和邮箱或密码输入有误

	}

}