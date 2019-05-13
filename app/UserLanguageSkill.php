<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLanguageSkill extends Model
{
    public $timestamps = false;

    protected $table = 'tlt_user_language';

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function language()
    {
        return $this->belongsTo('App\Language', "id", "language_id");
    }

    public function getSpeakingAttribute($attribute)
    {
        return $this->languageProficiencyOptions()[$attribute];
    }

    public function getReadingAttribute($attribute)
    {
        return $this->languageProficiencyOptions()[$attribute];
    }

    public function getWritingAttribute($attribute)
    {
        return $this->languageProficiencyOptions()[$attribute];
    }


    // public function setSpeakingAttribute($attribute)
    // {
    //     return $this->languageProficiencyOptions()[$attribute];
    // }

    // public function setReadingAttribute($attribute)
    // {
    //     return $this->languageProficiencyOptions()[$attribute];
    // }

    // public function setWritingAttribute($attribute)
    // {
    //     return $this->languageProficiencyOptions()[$attribute];
    // }


    public function languageProficiencyOptions()
    {
        return [
            1 => "Novice",
            2 => "Intermediate",
            3 => "Advanced",
            4 => "Native"
        ];
    }
}
