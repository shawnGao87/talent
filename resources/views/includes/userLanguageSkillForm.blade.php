<input type="hidden" name="user_id" value={{$userId}}>
<div class="form-group row justify-content-center">
    <label for="language" class="col-sm-4 col-form-label">Language</label>
    <div class="col-xs-12 col-sm-4">

    <select name="language_id" id="language" class="form-control">
        @foreach ($languages as $language)
            <option value = {{$language->id}} {{ $language->id == $userLanguageSkill->language_id ? "selected" : ''}}>{{$language->language}}</option>
        @endforeach
    </select>
    </div>
</div>

<div class="form-group row justify-content-center">
    
        
        <label for="speaking" class="col-sm-4 col-form-label">Speaking proficiency</label>
    
    <div class="col-xs-12 col-sm-4">
            <select name="speaking" id="speaking" class="form-control">
                    @foreach ($userLanguageSkill->languageProficiencyOptions() as $index => $proficiency)
                        <option value = {{$index}} {{ $proficiency == $userLanguageSkill->speaking ? "selected" : ''}}>{{$proficiency}}</option>
                    @endforeach
                </select>
        </div>

   
</div>

<div class="form-group row justify-content-center">
    <label for="reading" class="col-sm-4 col-form-label">Reading proficiency</label>
    <div class="col-xs-12 col-sm-4">
            <select name="reading" id="reading" class="form-control">
                    @foreach ($userLanguageSkill->languageProficiencyOptions() as $index => $proficiency)
                        <option value = {{$index}} {{ $proficiency == $userLanguageSkill->reading ? "selected" : ''}}>{{$proficiency}}</option>
                    @endforeach
                </select>
    </div>
    
</div>


<div class="form-group row justify-content-center">
    <label for="writing" class="col-sm-4 col-form-label">Writing proficiency</label>
    <div class="col-xs-12 col-sm-4">

    <select name="writing" id="writing" class="form-control">
        @foreach ($userLanguageSkill->languageProficiencyOptions() as $index => $proficiency)
            <option value = {{$index}} {{ $proficiency == $userLanguageSkill->writing ? "selected" : ''}}>{{$proficiency}}</option>
        @endforeach
    </select>
    </div>
</div>
    
@csrf