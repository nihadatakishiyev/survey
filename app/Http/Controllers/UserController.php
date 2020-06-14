<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function ans($id){
        $user = User::findOrFail($id);

        $ans = $user->with('answers.question')->get();

        return $ans;
    }
}
