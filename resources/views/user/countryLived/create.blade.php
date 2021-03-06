@extends('layouts.layout')



@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="container">
        <div class="card mt-5">
            <div class="card-header"><h2>Add New Country Experience</h2></div>
            <div class="card-body">
            <form action={{url('/userCountryExperience')}}  method="POST">
                        @include('includes.userCountryLivedForm')
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
