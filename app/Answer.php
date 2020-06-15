<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'user_id', 'survey_id', 'answer'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function survey(){
        return $this->belongsTo('App\Survey', 'survey_id');
    }
}
