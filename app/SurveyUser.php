<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyUser extends Model
{
    protected $fillable = ['survey_id', 'user_id'];
    protected $table = "survey_users";
}
