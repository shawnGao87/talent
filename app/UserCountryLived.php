<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCountryLived extends Model
{
    protected $guarded = [];

    protected $table = 'tlt_user_country_lived';
    public $timestamps = false;
    public function user()
    {
        return $this->belongsTo('App\User');
    }


    public function country()
    {
        return $this->belongsTo('App\Country');
    }

    public function getResidencyLengthAttribute($attr)
    {
        return $this->residenceLengthOptions()[$attr];
    }

    public function getResidencyRecencyAttribute($attr)
    {
        return $this->residenceRecencyOptions()[$attr];
    }

    public function getCountryIdAttribute($attr)
    {
        return $this->countryNames()[$attr];
    }

    public function residenceLengthOptions()
    {
        return [
            1 => '1-3 months',
            2 => '4-6 months',
            3 => '7-11 months',
            4 => '1-3 years',
            5 => 'More than 3 years'
        ];
    }

    public function residenceRecencyOptions()
    {
        return [
            1 => 'Within the last year',
            2 => '1-3 years ago',
            3 => '3-10 years ago',
            4 => 'More than 10 years ago'
        ];
    }

    public function countryNames()
    {
        $countries = Country::all()->toArray();
        $result = array();

        foreach ($countries as $index => $country) {
            $result[$country['id']] = $country['country'];
        }
        // dd($result);
        return $result;
    }
}
