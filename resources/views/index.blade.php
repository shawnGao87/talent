@extends('layouts.layout')

{{-- {{dd($user_hobby_ids)}} --}}
@section('content')
  
    <div class="container">
        
		<div class="card">
			<div class="card-header">
				Basic Info
			</div>
			<div class="card-body">
				FirstName: {{$user->firstname}} <br/>
				LastName: {{$user->lastname}}
			</div>
		</div>

		<ul class="nav nav-tabs card-header mt-5">
			<li class="nav-item">
				<a class="nav-link active" href="#language_skills" role="tab" data-toggle="tab">Languages</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#experienced_countries" role="tab" data-toggle="tab">Country Experiences</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#hobbies" role="tab" data-toggle="tab">Skills and Hobbies</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#us_cities" role="tab" data-toggle="tab">US Cities</a>
			</li>			
		</ul>
		<div class="tab-content card-body">
			<div class="tab-pane fade show active" id="language_skills" role="tabpanel" aria-labelledby="home-tab">
				<div class="d-flex justify-content-center">
					<a href={{url('/userLanguageSkills/create')}} class="btn btn-success mb-3">Add New Language Skill</a>
				</div>
				@include('includes.userLanguageSkillList')
			</div>
			<div class="tab-pane fade" id="experienced_countries" role="tabpanel" aria-labelledby="profile-tab">
				<div class="d-flex justify-content-center">
					<a href={{url('/userCountryExperience/create')}} class="btn btn-success mb-3">Add New Country Experience</a>
				</div>
				@include('includes.userExperiencedCountryList')
			</div>
			<div class="tab-pane fade" id="hobbies" role="tabpanel" aria-labelledby="messages-tab">
				@include('includes.userHobbyList')
			</div>
			<div class="tab-pane fade" id="us_cities" role="tabpanel" aria-labelledby="messages-tab">
				<h3 style="text-align:center;">Which U.S. cities do you feel comfortable navigating?</h3>
				<div class="d-flex justify-content-center">
					<a href={{url('/userCities/create')}} class="btn btn-success mb-3">Select Cities</a>
				</div>
				@include('includes.userCityList')
			</div>
		</div>
		
    </div>
@endsection