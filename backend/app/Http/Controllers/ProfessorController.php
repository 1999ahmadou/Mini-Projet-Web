<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class ProfessorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Professor::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|unique:professors',
            'name'=>'required|string',
            'grade'=>'required|string',
            'email'=>'required|email',
            'user_id'=>'required',

        ]);

        $teacher = new Professor;

        $teacher->id = $request->input('id');
        $teacher->name = $request->input('name');
        $teacher->grade = $request->input('grade');
        $teacher->email = $request->input('email');
        $teacher->user_id = $request->input('user_id');

        if($teacher->save())
        {
            return response()->json([
                'success'=>' Registered successfully'
            ],200);
        }else
        {
            return response()->json([
                'errors'=>' Sorry something want wrong'
            ],404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Professor $professor
     * @return Response
     */
    public function show(Professor $professor)
    {
        return $professor;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, int $id)
    {
        try {
            $this->validate($request, [
                'id' => 'required',
                'name' => 'required|string',
                'grade' => 'required|string',
                'email' => 'required|email|min:',

            ]);
        } catch (ValidationException $e) {
        }

        $teacher = Professor::find($id);

        $teacher->id = $request->input('id');
        $teacher->name = $request->input('name');
        $teacher->grade = $request->input('grade');
        $teacher->email = $request->input('email');

        if($teacher->save())
        {
            return response()->json([
                'success'=>' Updated successfully'
            ],200);
        }else
        {
            return response()->json([
                'errors'=>' Sorry something want wrong'
            ],404);
        }
    }

    public function hasCourse($id): bool
    {
        $exist = Courses::where('prof_id',$id)->first();

        if($exist)
        {
            return true;
        }else
        {
            return false;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Response
     */
    public function destroy($id): Response
    {
        $professor = Professor::find($id);
        if($professor->delete)
        {
            return response()->json([
                'success' => ' deleted successfully',
            ]);
        }else {
            return response()->json([
                'errors' => ' not deleted',
            ]);
        }
    }
}
