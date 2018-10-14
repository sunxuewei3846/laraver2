<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
	public function add($data)
	{
		foreach($data as $field => $value){
			$this->$field = $value;
		}

		return $this->save();
		// return $this->field();
	}

	public function select($lie,$where)
	{
		return DB::table('user')->where($lie,$where)->get();
		// return $where;
	}

	public function amend($u_id,$time)
	{
		return DB::table('user')->where('u_id', $u_id)->update(['state' => 1],['time' => $time]);
	}

	// 登陆
	public function landingelect($columnName,$data)
	{
		return DB::table('user')->where($columnName,$data['username_a'])->where('password',$data['password'])->get();
	}

	public function inser($data)
	{
		return DB::table('user')->insert(['username' => $data['username'], 'password' => $data['password'],'mobile' => $data['mobile'], 'mail' => $data['mail'], 'time' => $data['time']]);
	}

}