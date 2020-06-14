<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $fillable = [
      'user_id', 'name', 'description'
    ];

    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function questions(){
        return $this->hasMany('App\Question');
    }
}
