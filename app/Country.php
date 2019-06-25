<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    protected $table = 'tlt_country_list';

    public function user_country_lived()
    {
        return $this->hasMany('App\UserCountryExperience');
    }
}
