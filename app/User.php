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
	protected $appends = ['language_known', 'experienced_countries', 'hobbies_string'];
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
	 * * relationship with user_country_experience table
	 */
	public function user_country_experience()
	{
		return $this->hasMany('App\UserCountryExperience');
	}


	/**
	 * * getting the country names from the country_list table (Country::class)
	 */
	public function countries()
	{
		return $this->hasManyThrough('App\Country', 'App\UserCountryExperience', 'user_id', 'id', 'id', 'country_id');
	}

	public function hobbies()
	{
		return $this->hasManyThrough('App\Hobby', 'App\UserHobby', 'user_id', 'id', 'id', 'hobby_id');
	}

	public function getLanguageKnownAttribute()
	{
		$language_skills = $this->language_skills;
		$language_known = [];
		foreach ($language_skills as $index => $language_skill) {
			array_push($language_known, $language_skill->language_id);
		}
		$language_known_string = implode(', ', $language_known);
		return $language_known_string;
	}


	public function getExperiencedCountriesAttribute()
	{
		$user_country_experiences = $this->user_country_experience;
		$experienced_countries = [];
		foreach ($user_country_experiences as $index => $user_country_experience) {
			array_push($experienced_countries, $user_country_experience->country_id);
		}
		$experienced_countries_string = implode(', ', $experienced_countries);
		return $experienced_countries_string;
	}

	public function getHobbiesStringAttribute()
	{
		$hobbies = $this->hobbies;
		$hobbies_array = [];
		foreach ($hobbies as $index => $hobby) {
			array_push($hobbies_array, $hobby->hobby);
		}

		$hobbies_string = implode(', ', $hobbies_array);

		return $hobbies_string;
	}
}
