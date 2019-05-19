@extends('layouts.layout')

{{-- {{dd($users)}} --}}

@section('content')
  <div class="container my-5">
      <div id="adminFilter" class="my-4"></div>
  </div>
    <div class="container my-5">
        <table id="adminGrid" class="table table-striped">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Language Known</th>
                    <th>Country Lived</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                <td>{{$user['firstname']}}</td>
                    <td>{{$user['lastname']}}</td>
                    <td>{{$user['known_language']}}</td>
                    <td>{{$user['lived_countries']}}</td>
                    <td><a
                        class="btn btn-primary"
                        href="UserSkills/detail/"{{$user->id}} 
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