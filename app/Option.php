<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $fillable = [
       'c', 'content'
    ];

    public function question(){
        $this->belongsTo('App\Question');
    }

}
