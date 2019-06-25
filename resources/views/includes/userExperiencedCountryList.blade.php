<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Country</th>
			<th scope="col">Type</th>
			<th scope="col">Length</th>
			<th scope="col">Recency</th>
			<th scope="col">Edit / Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($user->user_country_experience as $country)
			<tr>
				<td>{{$country->country_id}}</td>
				<td>{{$country->experience_type}}</td>
				<td>{{$country->experience_year}} Years {{$country->experience_month}} Months</td>
				<td>Within {{$country->experience_recency}} Years</td>
				<td><a class="btn btn-primary" href={{url("/userCountryExperience/".$country->id."/edit")}}> Edit / Delete</a></td>
		
			</tr>
		@endforeach
	</tbody>
</table>