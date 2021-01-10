<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->validate($request, [
                'id'=>'required',
                'content'=>'required|string',
                'id_questionnaire'=>'required'
            ]);
        } catch (ValidationException $e) {
        }

        $qst = new Question;
        $qst->id = $request->input('id');
        $qst->content = $request->input('content');
        $qst->id_questionnaire = $request->input('id_questionnaire');

        if($qst->save())
        {
            return response()->json([
                'success'=>' Question added successfully',
            ],200);
        }else
        {
            return response()->json([
                'success'=>' Sorry ! Something want wrong',
            ],404);
        }
    }
}
