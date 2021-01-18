<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionCollection;
use App\Http\Resources\QuestionResource;
use App\Models\Question;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    public function index()
    {

        $question = Question::with(['propositions']);

        return QuestionCollection::collection($question->paginate(50))->response();
    }

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

    public function show(Question $question)
    {
        return new QuestionResource($question->load(['questionnaire']));
    }

}
