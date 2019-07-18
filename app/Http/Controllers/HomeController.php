<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Hobby;

class HomeController extends Controller
{



	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{

		require($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		$user_id = $GLOBALS['USER']->id;
		$user = User::with('language_skills', 'user_country_experience', 'hobbies', 'cities')->find($user_id);
		$user_hobby_ids = [];
		foreach ($user->hobbies as $index => $hobby) {
			array_push($user_hobby_ids, $hobby->id);
		}
		$hobbies = Hobby::all();
		return view('index', compact('user', 'hobbies', 'user_hobby_ids'));
	}

	public function currentUser()
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		$user = $USER;

		return response()->json($user);
	}
}
