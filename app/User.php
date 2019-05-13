<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $table = 'mdl_user';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * * relationship with language skills
     */
    public function language_skills()
    {
        return $this->hasMany('App\UserLanguageSkill');
    }


    /**
     * * getting language names from language_list table (Language::class)
     */
    public function languages()
    {
        /**
         * !! user_id = foreign key in UserLanguageSkill
         * !! id = id in Language table
         * !! id = local primary key in User talbe
         * !! language_id = local foreign key in UserLanguageSkill table
         * !! when querying, "where user_id = id (second) and id (first) = language_id
         */
        return $this->hasManyThrough('App\Language', 'App\UserLanguageSkill', 'user_id', 'id',  'id', 'language_id');
    }

    /**
     * * relationship with user_country_lived table
     */
    public function user_country_lived()
    {
        return $this->hasMany('App\UserCountryLived');
    }


    /**
     * * getting the country names from the country_list table (Country::class)
     */
    public function countries()
    {
        return $this->hasManyThrough('App\Country', 'App\UserCountryLived', 'user_id', 'id', 'id', 'country_id');
    }
}
