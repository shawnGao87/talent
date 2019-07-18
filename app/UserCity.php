<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCity extends Model
{
	protected $guarded = [];

	protected $table = 'tlt_user_city';

	protected $appends = ['state_cities'];


	public function getStateCitiesAttribute()
	{
		$jsonString = file_get_contents(base_path('resources/states.json'));
		$states = json_decode($jsonString, true);

		return $states;
	}
}
