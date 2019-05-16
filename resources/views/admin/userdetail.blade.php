@extends('layouts.layout')


@section('content')
    <div class="container my-5">
        <div class="row">
            <h3>Skill Details for {{$user['firstname'].' '.$user['lastname']}}</h3>
        </div>
        @if ($user['language_skills'])
        <div class="card my-5">
            <div class="card-header"><b>Language Skills</b></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Language</th>
                        <th scope="col">Speaking</th>
                        <th scope="col">Reading</th>
                        <th scope="col">Writing</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($user['language_skills'] as $language_skill)
                        <tr>
                        <th>{{$language_skill['language_id']}}</th>
                            <td>{{$language_skill['speaking']}}</td>
                            <td>{{$language_skill['reading']}}</td>
                            <td>{{$language_skill['writing']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif


        @if ($user['user_country_lived'])
        <div class="card my-5">
            <div class="card-header"><b>Country Lived In</b></div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Country</th>
                        <th scope="col">Residence Length</th>
                        <th scope="col">Residence Recency</th>
                        </tr>
                    </thead>
                    <tbody>                        
                        @foreach ($user['user_country_lived'] as $country_lived)
                        <tr>
                        <th>{{$country_lived['country_id']}}</th>
                            <td>{{$country_lived['residency_length']}}</td>
                            <td>{{$country_lived['residency_recency']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
@endsection