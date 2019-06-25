<?php

namespace App\Http\Controllers;

use App\UserCountryExperience;
use Illuminate\Http\Request;
use App\Country;
use Illuminate\Validation\Rule;
use App\Rules\YearMonthNotBothZero;

class UserCountryExperienceController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		$userId = $USER->id;
		$countries = Country::all();
		$userCountryExperience = new UserCountryExperience();
		return view('user.countryLived.create', compact('userId', 'countries', 'userCountryExperience'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store()
	{
		UserCountryExperience::create($this->validateUserCountryExperience());

		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\UserCountryExperience  $userCountryLived
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserCountryExperience $userCountryLived)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserCountryExperience  $userCountryExperience
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserCountryExperience $userCountryExperience)
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		$userId = $USER->id;
		$countries = Country::all();
		return view('user.countryLived.edit', compact('userCountryExperience', 'userId', 'countries'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserCountryExperience  $userCountryLived
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, UserCountryExperience $userCountryExperience)
	{
		$userCountryExperience->update($this->validateUserCountryExperience());

		return redirect("/");
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserCountryExperience  $userCountryLived
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserCountryExperience $userCountryExperience)
	{
		$userCountryExperience->delete();

		return redirect('/');
	}


	private function validateUserCountryExperience()
	{
		$user_country_experience = new UserCountryExperience();
		$year = request('experience_year');
		$month = request('experience_month');
		return request()->validate([
			"user_id" => 'required|integer',
			"country_id" => 'required|integer',
			'experience_type' => [
				'required',
				Rule::in(array_keys($user_country_experience->experienceTypeOptions()))
			],
			'experience_year' => [
				'required',
				Rule::in(array_keys($user_country_experience->experienceYearOptions())),
				new YearMonthNotBothZero($year, $month)
			],
			'experience_month' => [
				'required',
				Rule::in(array_keys($user_country_experience->experienceMonthOptions())),
				new YearMonthNotBothZero($year, $month)

			],
			'experience_recency' => [
				'required',
				Rule::in(array_keys($user_country_experience->experienceYearOptions()))
			],
			'other_experience_comments' => 'string',
			'comments' => 'string',
		]);
	}
}
