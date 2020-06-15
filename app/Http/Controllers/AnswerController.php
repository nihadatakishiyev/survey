<?php

namespace App\Http\Controllers;

use App\Answer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Answer[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index(Request $request)
    {
        return Answer::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Answer
     */
    public function store(Request $request)
    {
        $answer = new Answer;

        $answer->user_id = Auth::id();
        $answer->survey_id = $request->survey_id;
        $answer->answer = json_encode($request->answer);

        if ($answer->save()){
            return $answer;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Answer::findOrFail($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);

        $answer->user_id = Auth::id();
        $answer->survey_id = $request->input('survey_id');
        $answer->answer = $request->input('answer');

        if ($answer->save()){
            return $answer;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::findOrFail($id);

        if ($answer->delete()){
            return $answer;
        }
    }
}
