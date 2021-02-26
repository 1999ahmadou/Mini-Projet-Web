<?php

namespace App\Http\Controllers;

use App\Models\UserAnswers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'userAnswer'=>'required|array',
           'answer.*'
        ]);

        $ans_1 = $request->input('userAnswer[0]');
        $ans_2 = $request->input('userAnswer[1]');
        $ans_3 = $request->input('userAnswer[2]');
        $ans_4 = $request->input('userAnswer[3]');
        $ans_5 = $request->input('userAnswer[4]');

        $data = array($ans_1,$ans_2,$ans_3,$ans_4,$ans_5);
        $array = serialize($data);

        $userAns = $array;

        $userAns->save();

    }

    public static function delete()
    {
        foreach(UserAnswers::all() as $e)
        {
            try {
                $e->delete();
            } catch (\Exception $e) {
               
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
