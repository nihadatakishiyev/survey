<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'survey_id', 'content', 'question_type_id'
    ];

    public function options(){
        return $this->hasMany('App\Option');
    }

    public function answer(){
        return $this->hasMany('App\Answer', 'question_id');
    }

    public function survey(){
         return $this->belongsTo('App\Survey');
    }

}
