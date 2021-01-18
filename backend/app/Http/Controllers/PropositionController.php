<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropositionCollection;
use App\Models\Proposition;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Resources\Json\JsonResource;
use PhpOption\Option;

class PropositionController extends Controller
{
    public function index()
    {
        return new PropositionCollection(Proposition::with(['question'])->get());
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'value' => 'required|string',
                'id_question' => 'required'
            ]);
        } catch (ValidationException $e) {
        }


        $props = new Proposition;
        $props->id = $request->input('id');
        $props->value = $request->input('value');
        $props->id_question = $request->input('id_question');

        if($props->save())
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

    public function show(Proposition $props)
    {

        return new PropositionCollection($props->load(['question']));
    }
}
