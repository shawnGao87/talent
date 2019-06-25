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
				<a class="nav-link active" href="#language_skills" role="tab" data-toggle="tab">Language Skills</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#experienced_countries" role="tab" data-toggle="tab">Countries Experienced</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#hobbies" role="tab" data-toggle="tab">Hobbies</a>
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
		</div>
		
    </div>
@endsection