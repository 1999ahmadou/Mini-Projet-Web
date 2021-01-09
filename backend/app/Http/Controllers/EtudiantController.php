<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\etudiant;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;


class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

    public function index() //return all student in database
    {
        return etudiant::orderByDesc('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     * @throws ValidationException
     */

    public function signup(Request $request)
    {
        $this->validate($request,[
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|email',
            'password' => 'required|min:3',
        ]);

        $student = new etudiant;
        $student->nom = $request->input('nom');
        $student->prenom = $request->input('prenom');
        $student->email = $request->input('email');
        $student->password = $request->input('password');

        if($student->save())
        {
            return response()->json([
                'success' => ' successfully registered ',
            ], 200);
        }else
        {
            return response()->json([
                'errors' => ' something want wrong ',
            ], 404);
        }

    }

    public function Login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required|min:3',
            ]);
        } catch (ValidationException $e) {
        }

        $student = etudiant::where('email',$request->get('email'))->first();
        if($student)
        {
            if($request->get('password') === $student->password)
            {
                return response()->json([
                    'success' => "You're connected "
                ],200);
            }else
            {
                return response()->json([
                    'errors' => 'Email or Password invalid'
                ],422);
            }
        }
    }


    public function logout(): JsonResponse
    {
        Auth::logout();

        return response()->json([ 'success' => 'Disconnected']);
    }
    /**
     * Display the specified resource.
     * @param int $id
     * @return Response
     */

    public function show(int $id)
    {
        return etudiant::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param etudiant $etudiant
     * @return Response
     */
    public function update(Request $request, etudiant $etudiant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param etudiant $etudiant
     * @return Response
     */
    public function destroy(etudiant $etudiant)
    {
        //
    }
}
