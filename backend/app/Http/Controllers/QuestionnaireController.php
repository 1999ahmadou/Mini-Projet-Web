<?php

namespace App\Http\Controllers;

use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use function MongoDB\BSON\toJSON;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $data = DB::table('questionnaires')
            ->join('questions','questionnaires.id','questions.id_questionnaire')
            ->join('propositions','questions.id','propositions.id_question')
            ->get();
        return ($data->toArray());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->validate($request, [
                'id'=>'required',
                'title'=>'required|string',
                'id_course'=>'required'
            ]);
        } catch (ValidationException $e) {
        }

        $qcm = new Questionnaire;
        $qcm->id = $request->input('id');
        $qcm->title = $request->input('title');
        $qcm->id_course = $request->input('id_course');

        if($qcm->save())
        {
            return response()->json([
                'success'=>' Questionnaire added successfully',
            ],200);
        }else
        {
            return response()->json([
                'success'=>' Questionnaire added successfully',
            ],200);
        }
    }
}
