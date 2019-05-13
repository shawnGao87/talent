<?php

namespace App\Http\Controllers;

use App\UserCountryLived;
use Illuminate\Http\Request;
use App\Country;

class UserCountryLivedController extends Controller
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
        $countries = Country::all();
        $userCountryLived = new UserCountryLived();
        return view('user.countryLived.create', compact('userId', 'countries', 'userCountryLived'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UserCountryLived::create($this->validateUserCountryLived());

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserCountryLived  $userCountryLived
     * @return \Illuminate\Http\Response
     */
    public function show(UserCountryLived $userCountryLived)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserCountryLived  $userCountryLived
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCountryLived $userCountryLived)
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
        $userId = $USER->id;
        $countries = Country::all();
        return view('user.countryLived.edit', compact('userCountryLived', 'userId', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCountryLived  $userCountryLived
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCountryLived $userCountryLived)
    {
        $userCountryLived->update($this->validateUserCountryLived());

        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserCountryLived  $userCountryLived
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCountryLived $userCountryLived)
    {
        $userCountryLived->delete();

        return redirect('/');
    }


    private function validateUserCountryLived()
    {
        return request()->validate([
            "user_id" => 'required|integer',
            "country_id" => 'required|integer',
            'residency_length' => 'required|integer',
            'residency_recency' => 'required|integer'
        ]);
    }
}
