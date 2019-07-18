<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserCity;

class UserCityController extends Controller
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
		$user_cities = UserCity::whereUserId($userId)->get()->toArray();
		$userCity = new UserCity();
		$user_cities_arr = array();
		foreach ($user_cities as $user_city) {
			array_push($user_cities_arr, $user_city['state'] . '-' . $user_city['city']);
		}
		return view('user.cities.create', compact('userId', 'userCity', 'user_cities_arr'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		// dd($request);
		$user_id = $request->user_id;

		if ($request->states) {
			UserCity::whereUserId($user_id)->delete();
			foreach ($request->states as $state => $cities) {
				foreach ($cities as $index => $city) {
					$user_city = new UserCity();
					$user_city->user_id = $user_id;
					$user_city->city = $city;
					$user_city->state = $state;
					$user_city->save();
				}
			}
		} else {
			UserCity::whereUserId($user_id)->delete();
		}

		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//
	}
}
