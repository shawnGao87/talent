<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCountryExperience extends Model
{
	protected $guarded = [];

	protected $table = 'tlt_user_country_experience';
	public function user()
	{
		return $this->belongsTo('App\User');
	}


	public function country()
	{
		return $this->belongsTo('App\Country');
	}



	// public function getExperienceRecencyAttribute($attr)
	// {
	// 	return $this->experienceRecencyOptions()[$attr];
	// }

	public function getCountryIdAttribute($attr)
	{
		return $this->countryNames()[$attr];
	}



	// public function experienceRecencyOptions()
	// {
	// 	return [
	// 		1 => 'Within the last year',
	// 		2 => '1-3 years ago',
	// 		3 => '3-10 years ago',
	// 		4 => 'More than 10 years ago'
	// 	];
	// }

	public function experienceTypeOptions()
	{
		return [
			'lived' => 'lived',
			'travelled' => 'travelled',
			'protective_details' => 'protective details',
			'other_experience' => 'other experience'
		];
	}

	public function experienceYearOptions()
	{
		return [
			0 => '0',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
			5 => '5',
			6 => '6',
			7 => '7',
			8 => '8',
			9 => '9',
			10 => '10',
			11 => '11',
			12 => '12',
			13 => '13',
			14 => '14',
			15 => '15',
			16 => '16',
			17 => '17',
			18 => '18',
			19 => '19',
			20 => '20',
			21 => '21',
			22 => '22',
			23 => '23',
			24 => '24',
			25 => '25',
			26 => '26',
			27 => '27',
			28 => '28',
			29 => '29',
			30 => '30',
			31 => '31',
			32 => '32',
			33 => '33',
			34 => '34',
			35 => '35',
			36 => '36',
			37 => '37',
			38 => '38',
			39 => '39',
			40 => '40',
			41 => '41',
			42 => '42',
			43 => '43',
			44 => '44',
			45 => '45',
			46 => '46',
			47 => '47',
			48 => '48',
			49 => '49',
			50 => '50',
		];
	}

	public function experienceMonthOptions()
	{
		return [
			0 => '0',
			1 => '1',
			2 => '2',
			3 => '3',
			4 => '4',
			5 => '5',
			6 => '6',
			7 => '7',
			8 => '8',
			9 => '9',
			10 => '10',
			11 => '11',
		];
	}

	public function countryNames()
	{
		$countries = Country::all()->toArray();
		$result = array();

		foreach ($countries as $index => $country) {
			$result[$country['id']] = $country['country'];
		}
		return $result;
	}
}
