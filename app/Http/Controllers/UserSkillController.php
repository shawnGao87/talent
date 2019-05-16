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
        $user = $this->getUserSkills($id);

        return response()->json($user);
    }

    public function detail($id)
    {
        $user = $this->getUserSkills($id);

        return view('admin.userdetail', compact('user'));
    }

    public function getUserSkills($id)
    {
        $user = User::with(['language_skills',  'user_country_lived'])->find($id)->toArray();
        return $user;
    }
}
