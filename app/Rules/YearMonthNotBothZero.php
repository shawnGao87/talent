<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YearMonthNotBothZero implements Rule
{
	public $year;
	public $month;
	/**
	 * Create a new rule instance.
	 *
	 * @return void
	 */
	public function __construct($year, $month)
	{
		$this->year = $year;
		$this->month = $month;
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
		if ($this->year == 0) {
			return $this->month != 0;
		}
		if ($this->month == 0) {
			return $this->year != 0;
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
		return 'Input invalid. Both Year and Month are 0.';
	}
}
