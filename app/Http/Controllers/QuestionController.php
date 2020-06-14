<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::with('options')->get();

        return $questions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Question
     */
    public function store(Request $request)
    {
        $question = new Question;

        $question->survey_id = $request->input('survey_id');
        $question->content = $request->input('content');
        $question->question_type_id = $request->input('question_type_id');

        if ($question->save()){
            return $question;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        return Question::with('options')->where('id', $id)->get();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $question = findOrFail($id);

        $question->survey_id = $request->input('survey_id');
        $question->content = $request->input('content');
        $question->question_type_id = $request->input('question_type_id');

        if ($question->save()){
            return $question;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);

        if($question->delete()){
            return $question;
        }
    }
}
