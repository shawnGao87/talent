<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "HomeController@index")->middleware('requireLogin');

/**
 * * Route for getting the current user
 * * Used by React, componentWillMount
 */
Route::get('currentUser', "HomeController@currentUser");

/**
 * * CRUD route for users' Language skills
 */
Route::resource('userLanguageSkills', 'UserLanguageSkillController');

/**
 * * CRUD route for users' Country Lived skills
 */
Route::resource('userCountryExperience', 'UserCountryExperienceController');


/**
 * * CRUD Route for Languages 
 */
Route::resource('languages', 'LanguageController');
Route::get('allLanguages', 'LanguageController@allLanguages');

/**
 * * CRUD Route for Countries 
 */
Route::resource('countries', 'CountryController');
Route::get('allCountries', 'CountryController@allCountries');


/**
 * * Admin Index 
 */
Route::get('admin', 'AdminController@index');
Route::post('admin', 'AdminController@index');

/**
 * * Get All Users for Admin panel
 */
Route::get('users', 'AdminController@getAllUsers');


/**
 * !! Route used by TalentForm.js fetching current user's skills
 */
Route::get('UserSkills/{id}', 'UserSkillController@index');

Route::get('UserSkills/detail/{id}', 'UserSkillController@detail');

Route::get('allHobbies', 'HobbiesController@allHobbies');


/**
 * * CRUD route for users' Country Lived skills
 */
Route::resource('userHobbies', 'UserHobbiesController');
