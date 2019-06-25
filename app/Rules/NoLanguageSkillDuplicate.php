<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\UserLanguageSkill;

class NoLanguageSkillDuplicate implements Rule
{
	private $user_id;
	private $user_language_skill_id;
	/**
	 * Create a new rule instance.
	 *
	 * @return void
	 */
	public function __construct($user_id)
	{
		$this->user_id = $user_id;
	}

	/**
	 * Determine if the validation rule passes.
	 *
	 * @param  string  $attribute
	 * @param  mixed  $value
	 * @return bool
	 */
	public function passes($attribute, $value)
	{
		$user_language_skill = UserLanguageSkill::whereUserId($this->user_id)->whereLanguageId($value)->get();
		if (sizeof($user_language_skill) >= 1) {
			$this->user_language_skill_id = $user_language_skill[0]->id;
			return false;
		}

		return true;
	}

	/**
	 * Get the validation error message.
	 *
	 * @return string
	 */
	public function message()
	{
		return 'You had this language added before. Please <a href=' . url('userLanguageSkills/' . $this->user_language_skill_id . '/edit') . '>click here </a> to update your skill.';
	}
}
