<input type="hidden" name="user_id" value={{$userId}}>
<div class="form-group row justify-content-center">
    <label for="language" class="col-sm-4 col-form-label">Country</label>
    <div class="col-xs-12 col-sm-4">

    <select name="country_id" id="country" class="form-control">
        @foreach ($countries as $country)
            <option value = {{$country->id}} {{ $country->id == $userCountryLived->country_id ? "selected" : ''}}>{{$country->country}}</option>
        @endforeach
    </select>
    </div>
</div>

<div class="form-group row justify-content-center">
    
        
        <label for="residency_length" class="col-sm-4 col-form-label">How long did you live there?</label>
    
    <div class="col-xs-12 col-sm-4">
            <select name="residency_length" id="residency_length" class="form-control">
                    @foreach ($userCountryLived->residenceLengthOptions() as $index => $length)
                        <option value = {{$index}} {{ $length == $userCountryLived->residency_length ? "selected" : ''}}>{{$length}}</option>
                    @endforeach
                </select>
        </div>

   
</div>

<div class="form-group row justify-content-center">
    <label for="residency_recency" class="col-sm-4 col-form-label">How recently did you live there?</label>
    <div class="col-xs-12 col-sm-4">
            <select name="residency_recency" id="residency_recency" class="form-control">
                    @foreach ($userCountryLived->residenceRecencyOptions() as $index => $recency)
                        <option value = {{$index}} {{ $recency == $userCountryLived->residence_recency ? "selected" : ''}}>{{$recency}}</option>
                    @endforeach
                </select>
    </div>
    
</div>



    
@csrf