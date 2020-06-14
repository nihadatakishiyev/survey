<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
       'question_id', 'content'
    ];

    public function question(){
        $this->belongsTo('App\Question');
    }

}
