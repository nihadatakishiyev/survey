<?php

namespace App\Http\Controllers;

use App\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Option[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {
        $option = Option::all();

        return $option;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Option
     */
    public function store(Request $request)
    {
        $option = new Option;

        $option->question_id = $request->input('question_id');
        $option->content = $request->input('content');

        if($option->save()){
            return $option;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Option::where('id', $id)->get();
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $option = Option::findOrFail($id);

        $option->question_id = $request->input('question_id');
        $option->content = $request->input('content');

        if($option->save()){
            return $option;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Option  $option
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $option = Option::findOrFail($id);

        if ($option->delete()){
            return $option;
        }
    }
}
