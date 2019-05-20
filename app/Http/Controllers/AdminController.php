<?php

namespace App\Http\Controllers;

use App\User;

class AdminController extends Controller
{
    public function index()
    {
        // $users = User::with(['language_skills',  'user_country_lived'])->get();
        // $users = $this->allUsers($users);
        $userQuery = User::with(['language_skills',  'user_country_lived']);

        if (isset(request()->condition)) {
            // dd(request());


            $conditions = request()->condition;
            $condition_options = request()->condition_options;
            $and_ors = request()->andOr;

            foreach ($conditions as $num => $condition) {

                if (in_array($condition, ['language_id', 'reading', 'writing', 'speaking'])) {
                    $this->qualifier($userQuery, 'language_skills', $num, $condition, $condition_options, $and_ors);
                } else {
                    $this->qualifier($userQuery, 'user_country_lived', $num, $condition, $condition_options, $and_ors);
                }
            }
        }


        /**
         * ? TODO Add String filter return to view
         */

        $users = $this->allUsers($userQuery->get());


        return view('admin.index', compact('users'));
    }

    public function getAllUsers()
    {

        $users = User::with(['language_skills',  'user_country_lived'])->get();
        $users = $this->allUsers($users);
        return response()->json($users);
    }


    private function allUsers($users)
    {


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

        return $users;
    }

    private function qualifier($userQuery, $relation, $num, $condition, $condition_options, $and_ors)
    {
        // !! first condition doesn't have and / or 
        if ($num == 1) {
            $userQuery->whereHas($relation, function ($q) use ($condition, $condition_options, $num) {
                $q->whereIn($condition, $condition_options[$num]);
            });
        } else {
            if ($and_ors[$num] == 'and') {
                $userQuery->whereHas($relation, function ($q) use ($condition, $condition_options, $num) {
                    $q->whereIn($condition, $condition_options[$num]);
                });
            } else {
                $userQuery->orWhereHas($relation, function ($q) use ($condition, $condition_options, $num) {
                    $q->whereIn($condition, $condition_options[$num]);
                });
            }
        }
    }
}
