<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class survey extends Model
{
    protected $fillable = [
      'user_id', 'name', 'description', 'data'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function answer(){
        return $this->hasMany('App\Answer');
    }
}
