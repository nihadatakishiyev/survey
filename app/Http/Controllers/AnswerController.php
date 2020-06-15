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
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
//        dd($request);
//        $user = User::where('api_token', $request->query('api_token'))->get();
        if(Auth::check()){
            return Auth::user();
        }
        else return 'false';



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

        $answer->question_id = $request->input('question_id');
        $answer->responder_id = Auth::id();
        $answer->option_id = $request->input('option_id');

        $query = 'select max(times) from answers where question_id = ' . $answer->question_id . ' and responder_id = ' . Auth::id();

        $answer->times = DB::select($query);

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
    public function show(Answer $answer)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }
}
