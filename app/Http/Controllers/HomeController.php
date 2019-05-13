<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {


        return view('index');
    }

    public function currentUser()
    {
        require_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');
        $user = $USER;

        return response()->json($user);
    }
}
