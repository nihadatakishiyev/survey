<?php

namespace App\Http\Controllers;

use App\survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $surveys = survey::all();

        return $surveys;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return survey
     */
    public function store(Request $request)
    {
        $survey = new survey;

        $survey->user_id = Auth::user()->getAuthIdentifier();
        $survey->name = $request->name;
        $survey->description = $request->description;
        $survey->data = json_encode($request->data);
//        dd($survey);
        if($survey->save()){
            return $survey;
        };
    }

    /**
     * Display the specified resource.
     *
     * @param survey $id
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function show($id)
    {
        return survey::find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $survey = survey::findOrFail($id);

        $survey->user_id = $request->input('user_id');
        $survey->survey_id = $request->input('survey_id');
        $survey->name = $request->input('name');
        $survey->description = $request->input('description');
        $survey->data = $request->input('data');

        if($survey->save()){
            return $survey;
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\survey  $survey
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $survey = survey::findOrFail($id);

        if($survey->delete()){
            return $survey;
        }
    }
}
