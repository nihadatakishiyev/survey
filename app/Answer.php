<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = [
        'question_id', 'responder_id', 'option_id'
    ];

    public function question(){
        return $this->belongsTo('App\Question');
    }

    public function responder(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function option(){
        return $this->hasOne('App\Option', 'option_id');
    }
}
