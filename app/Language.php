<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $table = 'tlt_language_list';

    public function user_language_skills()
    {
        return $this->hasMany('App\UserLanguageSkill');
    }
}
