<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.index');
    }

    public function getAllUsers()
    {
        $users = User::with(['language_skills',  'user_country_lived'])->get();

        foreach ($users as $user) {
            $languageArr = array();
            foreach ($user->language_skills as $l) {
                array_push($languageArr, $l->language_id);
            }
            $user->known_language = implode(", ", $languageArr);


            $countryArr = array();
            foreach ($user->user_country_lived as $c) {
                array_push($countryArr, $c->country_id);
            }
            $user->lived_countries = implode(", ", $countryArr);
        }

        return response()->json($users);
    }
}
