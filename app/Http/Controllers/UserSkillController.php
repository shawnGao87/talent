<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Language;
use App\Country;

class UserSkillController extends Controller
{
    /**
     * * Get User's Language & Country Skills
     * ? Potentially more in the future
     */
    public function index($id)
    {
        $user = User::with(['language_skills', 'languages', 'countries', 'user_country_lived'])->find($id)->toArray();

        if (sizeof($user['language_skills']) > 0) {
            foreach ($user['language_skills'] as $key => $l) {
                $user['language_skills'][$key]["language"] = Language::find($l['language_id'])->language;
            }
        }

        if (sizeof($user['user_country_lived']) > 0) {
            foreach ($user['user_country_lived'] as $key => $l) {
                $user['user_country_lived'][$key]["country"] = Country::find($l['country_id'])->country;
            }
        }

        // dd($user);
        return response()->json($user);
    }
}
