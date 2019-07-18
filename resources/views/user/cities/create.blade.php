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
            <div class="card-header"><h2>Edit Cities</h2></div>
            <div class="card-body">
            <form action={{url('/userCities')}}  method="POST">
                        @include('includes.userCityForm')
                        <button type="submit" class="btn btn-success" style="position:fixed;bottom:30px;width:200px;">Update</button>
                    </form>
            </div>
        </div>
    </div>
@endsection