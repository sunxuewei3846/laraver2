<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
	public function add($data)
	{
		foreach($data as $field => $value){
			$this->$field = $value;
		}

		return $this->save();
	}
}