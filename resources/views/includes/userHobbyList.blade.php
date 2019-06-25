

<form action={{url('/userHobbies')}} method="post">
	@csrf
	<input type="hidden" name="user_id" value={{$user->id}}>
	@foreach ($hobbies as $hobby)
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="{{$hobby->id}}" id="{{$hobby->id}}" name="user_hobbies[]" {{in_array($hobby->id, array_values($user_hobby_ids)) ? "checked": ""}}>
			<label class="form-check-label" for="{{$hobby->id}}">
					{{$hobby->hobby}}
			</label>
		</div>
	@endforeach
	<button type="submit" class="btn btn-success">Update</button>
</form>