<?php

namespace App\Http\Controllers;

use App\Http\Resources\AnswerResource;
use App\Models\Answer;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return AnswerResource::collection(Answer::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request,[
           'id'=>'required',
           'answer'=>'required|string',
           'id_question'=>'required',
        ]);

        $answers = new Answer;
        $answers->id = $request->input('id');
        $answers->answer = $request->input('answer');
        $answers->id_question = $request->input('id_question');

        if($answers->save())
        {
            return response()->json([
                'success'=>'well stored'
            ],200);
        }else
        {
            return response()->json([
                'fail'=>' Something want wrong'
            ]);
        }

    }

    public function Correct_answer(Request $request)
    {
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
