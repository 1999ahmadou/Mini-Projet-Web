<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\UserAnswers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SurveyController extends Controller
{

    public static function Verifier(Request $request) : JsonResponse
    {
        $user = new UserAnswerController();
        try {
            $user->store($request);
        } catch (ValidationException $e) {
        }

        $getUserAnswers = UserAnswers::all();
        $getGoodAnswers = Answer::all()
            ->where('is_true','==','1');

        $AC = new AnswerController();
        $result = $AC->Correct_answer($getUserAnswers,$getGoodAnswers);

        if($result < 3)
        {
            $user->delete();
            return response()->json([
                'failed' => ' You failed with '.$result .' good answers '
            ]);
        }else
        {
            $user->delete();
            return response()->json([
                'success' => ' Well done, you have got '.$result .' good answers'
            ],200);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
