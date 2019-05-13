<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::with(['language_skills', 'languages', 'countries', 'user_country_lived'])->get();

        return view('admin.index');
    }

    public function getAllUsers()
    {
        $users = User::with(['language_skills', 'languages', 'countries', 'user_country_lived'])->get();

        foreach ($users as $user) {
            $languageArr = array();
            foreach ($user->languages as $l) {
                array_push($languageArr, $l->language);
            }
            $user->known_language = implode(", ", $languageArr);

            $countryArr = array();
            foreach ($user->countries as $c) {
                array_push($countryArr, $c->country);
            }
            $user->lived_countries = implode(", ", $countryArr);
        }

        return response()->json($users);
    }
}
