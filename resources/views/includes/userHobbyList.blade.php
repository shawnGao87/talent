

<form action={{url('/userHobbies')}} method="post">
	@csrf
	<input type="hidden" name="user_id" value={{$user->id}}>
	@php
		$hobby_count = sizeof($hobbies);
		$column_size = ceil($hobby_count / 3);
	@endphp
	<div class="row">

		<div class="col-xs-12 col-sm-4">
			@for ($i = 0; $i < $column_size; $i++)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$hobbies[$i]->id}}" id="{{$hobbies[$i]->id}}" name="user_hobbies[]" {{in_array($hobbies[$i]->id, array_values($user_hobby_ids)) ? "checked": ""}}>
				<label class="form-check-label" for="{{$hobbies[$i]->id}}">
						{{$hobbies[$i]->hobby}}
				</label>
			</div>
			@endfor
		</div>
		
		<div class="col-xs-12 col-sm-4">
			@for ($i = $column_size; $i < $column_size * 2 ; $i++)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$hobbies[$i]->id}}" id="{{$hobbies[$i]->id}}" name="user_hobbies[]" {{in_array($hobbies[$i]->id, array_values($user_hobby_ids)) ? "checked": ""}}>
				<label class="form-check-label" for="{{$hobbies[$i]->id}}">
						{{$hobbies[$i]->hobby}}
				</label>
			</div>
			@endfor
		</div>

		<div class="col-xs-12 col-sm-4">
			@for ($i = $column_size * 2; $i < $hobby_count ; $i++)
			<div class="form-check">
				<input class="form-check-input" type="checkbox" value="{{$hobbies[$i]->id}}" id="{{$hobbies[$i]->id}}" name="user_hobbies[]" {{in_array($hobbies[$i]->id, array_values($user_hobby_ids)) ? "checked": ""}}>
				<label class="form-check-label" for="{{$hobbies[$i]->id}}">
						{{$hobbies[$i]->hobby}}
				</label>
			</div>
			@endfor
		</div>
	</div>
	<button type="submit" class="btn btn-success">Update</button>
</form>