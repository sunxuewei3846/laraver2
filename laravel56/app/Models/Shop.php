<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shop extends Model
{
	public function select()
	{
		return DB::table('type')->get();
	}
	public function selectWhere($field,$content)
	{
		return DB::table('shop')->where($field,$content)->get();
	}
}