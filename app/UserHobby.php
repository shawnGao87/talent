<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserHobby extends Model
{
	protected $table = "tlt_user_hobby";
	protected $guarded = [];

	public $timestamps = false;
}
