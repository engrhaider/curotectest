<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $fillable = ['name'];
    protected $table = 'surveys';
    public $timestamps = false;

    public function assignedUsers(){
        return $this->belongsToMany('App\User', 'survey_users','survey_id','user_id');
    }
}
