<?php

namespace App\Http\Controllers;

use App\Http\Resources\QcmResource;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class QuestionnaireController extends Controller
{
    public function index()
    {
        $qcm = Questionnaire::with(['questions.propositions'])->get();
        return QcmResource::collection($qcm);
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

    public function show($id)
    {
        $qcm = Questionnaire::with(['questions.propositions'])->where('id',$id)->get();

        return QcmResource::collection($qcm);
    }
}
