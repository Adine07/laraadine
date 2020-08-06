<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
	protected $fillable = [
		'name', 'nik', 'gender', 'phone', 'birth_date', 'address', 'is_parent'
	];

	public function students()
	{
		return $this->hasMany('App\Model\Student');
	}
}
