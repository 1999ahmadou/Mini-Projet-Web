<?php

namespace App\Http\Controllers;

use App\Models\etudiant;
use Illuminate\Http\Request;
use \Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{/*
    public function RegisterValidation($request): array
    {
        $rules = array(
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|email|string',
            'pass'=>'required|string'
        );


        return $this->validate($request, $rules);
    }
    public function register(Request $request)
    {
        $request = new validator([
            'nom'=>'required|string',
            'prenom'=>'required|string',
            'email'=>'required|email|string',
            'pass'=>'required|string'
        ]);

        if($request->passes)
        {
            $this->create($request->all());

            return response()->json([
                'success'=>' well registered'
            ]);

        }else {
            return redirect()->back()->withErrors('errors ! ');
        }

    }

    public function login(Request $request)
    {
        $request = $this->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);

        $credentials = request('email','password');

        if(Auth::attempt($credentials))
        {
            return response()->json([
                'Message' => " You're connected "
            ],200);
        }else {
            return response()->json([
                'message'=>'Failed to connect '
            ],401);
        }

    }

    public function create(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'nom'=>'required',
            'prenom'=>'required|string',
            'email'=>'required|string|email',
            'pass'=>'required|string'
        ]);

        $student = new etudiant;

        $student->nom = $request->nom;
        $student->prenom = $request->prenom;
        $student->email = $request->email;
        $student->password = $request->password;

        $query = $student->save();

        if($query)
        {
            return back()->with('success',' you have been successfully registered ');
        }else
        {
            return back()->with('error','something went wrong');
        }
    }*/
}
