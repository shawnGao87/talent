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
            <div class="card-header"><h2>Edit Country You Have Lived In</h2></div>
            <div class="card-body">
            <form action={{url('/userCountryExperience\/').$userCountryExperience->id}}  method="POST">
                @method('PUT')
                @include('includes.userCountryLivedForm')
                <button type="submit" class="btn btn-success">Submit</button>
                <a href={{url('/')}}  class="btn btn-default">Cancel</a>
            </form>
            <form action={{url("/userCountryExperience\/").$userCountryExperience->id}}  method="post">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </div>
        </div>
    </div>
@endsection
