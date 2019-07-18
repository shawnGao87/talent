<div class="row">
	
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">State</th>
				<th scope="col">City</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($user->cities as $city)
				<tr>
					<td>{{$city->state}}</td>
					<td>{{$city->city}}</td>
					
				</tr>
			@endforeach
		</tbody>
	</table>
</div>