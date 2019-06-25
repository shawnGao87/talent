<table class="table table-striped">
	<thead>
		<tr>
			<th scope="col">Language</th>
			<th scope="col">Speaking</th>
			<th scope="col">Reading</th>
			<th scope="col">Writing</th>
			<th scope="col">Edit / Delete</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($user->language_skills as $language_skill)
			<tr>
				<td>{{$language_skill['language_id']}}</td>
				<td>{{$language_skill['speaking']}}</td>
				<td>{{$language_skill['reading']}}</td>
				<td>{{$language_skill['writing']}}</td>
				<td><a class="btn btn-primary" href={{url("/userLanguageSkills/".$language_skill->id."/edit")}}> Edit / Delete</a></td>
		
			</tr>
		@endforeach
	</tbody>
</table>