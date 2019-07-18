@extends('layouts.layout')

{{-- {{dd($users)}} --}}

@section('content')
  <div class="container my-5">
        <form action={{url('/admin')}} method="post">
			@csrf
            <div id="adminFilter" class="my-4"></div>
			<div id="addFilter" class="mb-3"></div>
            <button type="submit" class="btn btn-success">Filter Result</button>
            <a href={{url('/admin')}} class="btn btn-outline-primary">Clear Filters</a>
		</form>
		@if (session()->has('filter_empty_error'))
			<div class="alert alert-danger mt-3" role="alert">
				{{session()->get('filter_empty_error')}}
			</div>
		@endif
  </div>
    <div class="container my-5">
        <table id="adminGrid" class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Language Known</th>
                    <th>Country Experiences</th>
                    <th>Skills and Hobbies</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                	<td>{{$user['firstname']}}</td>
                    <td>{{$user['lastname']}}</td>
                    <td>{{$user['language_known']}}</td>
                    <td>{{$user['experienced_countries']}}</td>
                    <td>{{$user['hobbies_string']}}</td>
                    <td><a
                        class="btn btn-primary"
                        href="UserSkills/detail/{{$user->id}}" 
                    >
                        Detail
                    </a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('#adminGrid').DataTable();
        } );
    </script>
@endsection