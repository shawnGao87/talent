<input type="hidden" name="user_id" value={{$userId}}>
<div class="form-group row justify-content-center">
    I have


    <select name="experience_type" id="experience_type" class="d-inline-block mx-2">
        @foreach($userCountryExperience->experienceTypeOptions() as $key=>$value)
            <option value={{$key}} {{$userCountryExperience->experience_type == $key ? 'selected' : ''}}>{{$value}}</option>
        @endforeach
    </select>

     in the country of
    <select name="country_id" id="country_id" class="d-inline-block mx-2">
        @foreach($countries as $index => $country)
            <option value={{$country->id}} {{$userCountryExperience->country_id == $id ? 'selected' : ''}}>{{$country->country}}</option>
        @endforeach
    </select>

    for a total of

    <select name="experience_year" id="experience_year" class="d-inline-block mx-2">
        @foreach($userCountryExperience->experienceYearOptions() as $key => $value)
            <option value={{$key}} {{$userCountryExperience->experience_year == $key ? 'selected' : ''}}>{{$value}} </option>
        @endforeach
    </select>
    years and

    <select name="experience_month" id="experience_month" class="d-inline-block mx-2">
        @foreach($userCountryExperience->experienceMonthOptions() as $key => $value)
            <option value={{$key}} {{$userCountryExperience->experience_month == $key ? 'selected' : ''}}>{{$value}} </option>
        @endforeach
    </select>
    months.

	<div class="form-group mt-5" id="other_experience_comments_container" style="display:none;">
		<label for="comments">Please explain what other experience did you have.</label>
		<textarea class="form-control" id="other_experience_comments" rows="4"></textarea>
		
	</div>
	
</div>



<div class="form-group row justify-content-center">
    The experience was within the last 
    <select name="experience_recency" id="experience_recency" class="d-inline-block mx-2">
        @foreach ($userCountryExperience->experienceYearOptions() as $index => $recency)
            <option value = {{$index}} {{ $recency == $userCountryLived->residence_recency ? "selected" : ''}}>{{$recency}}</option>
        @endforeach
    </select>

	years.
    
</div>


<div class="form-group">
	<label for="comments">Please include additional comments on your experience. (e.g. specific cities you know well, cultural knowledge, etc..)</label>
    <textarea class="form-control" id="comments" rows="4"></textarea>
    
</div>


    
@csrf


<script>
	$('#experience_type').on('change', function () {
		if ($('#experience_type').val() == 'other_experience') {
			$('#other_experience_comments_container').show();
		} else {
			$('#other_experience_comments_container').hide();
		}
	})
</script>
