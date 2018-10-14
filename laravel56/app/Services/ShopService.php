<?php
namespace App\Services;

use App\Models\Shop;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Jobs\job;

class ShopService extends Controller
{

	public function ShopType()
	{
		$shopObject = new Shop;
		return $shopObject->select();
	}

	public function XiaomiStarItems($field,$content)
	{
		$shopObject = new Shop;
		return $shopObject->selectWhere($field,$content);
	}
}