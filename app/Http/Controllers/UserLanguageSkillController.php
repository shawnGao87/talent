<?php

namespace App\Http\Controllers;

use App\UserLanguageSkill;
use Illuminate\Http\Request;
use App\Language;
use Illuminate\Validation\Rule;
use App\Rules\NoLanguageSkillDuplicate;

class UserLanguageSkillController extends Controller
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
		$languages = Language::all();
		$userLanguageSkill = new UserLanguageSkill();
		return view("user.language.create", compact('languages', 'userLanguageSkill', 'userId'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store()
	{
		// dd($this->validateLanguageSkill());
		UserLanguageSkill::create($this->validateLanguageSkill());
		return redirect('/');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\UserLanguageSkill  $userLanguageSkill
	 * @return \Illuminate\Http\Response
	 */
	public function show(UserLanguageSkill $userLanguageSkill)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\UserLanguageSkill  $userLanguageSkill
	 * @return \Illuminate\Http\Response
	 */
	public function edit(UserLanguageSkill $userLanguageSkill)
	{
		require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
		$userId = $USER->id;
		$languages = Language::all();
		return view('user.language.edit', compact('userLanguageSkill', 'userId', 'languages'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\UserLanguageSkill  $userLanguageSkill
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, UserLanguageSkill $userLanguageSkill)
	{
		// dd($userLanguageSkill);
		$userLanguageSkill->update($this->validateLanguageSkill());
		return redirect('/');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\UserLanguageSkill  $userLanguageSkill
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(UserLanguageSkill $userLanguageSkill)
	{
		$userLanguageSkill->delete();
		return redirect('/');
	}


	private function validateLanguageSkill()
	{

		// $user_language_skill_id = UserLanguageSkill::whereUserId(request('user_id'))->whereLanguageId(request('language_id'))->first();
		// dd($user_language_skill_id->id);
		$method = request()->method();


		$check_language_duplicate = $method == 'POST' ? new NoLanguageSkillDuplicate(request('user_id')) : '';
		return request()->validate([
			"user_id" => 'required|integer',
			"language_id" => [
				'required',
				'integer',
				$check_language_duplicate
				// Rule::unique('tlt_user_language', 'language_id')->where(function ($query) {
				// 	return $query->where('user_id', request('user_id'));
				// })->ignore($user_language_skill_id->id)
			],
			'speaking' => 'required|integer',
			'reading' => 'required|integer',
			'writing' => 'required|integer'
		]);
	}
}
