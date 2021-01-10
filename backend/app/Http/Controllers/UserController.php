<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return User::orderBy('created_at')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    public function signup(Request $request)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:5',
                'status' => 'required|string'
            ]);
        } catch (ValidationException $e) {
        }

        $user = new User;

        if($request->input('status') === 'student')
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->status = $request->input('status','student');

        }else if($request->input('status') === 'professor')
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = $request->input('password');
            $user->status = $request->input('status');
        }

        if($user->save())
        {
            return response()->json([
                'success'=>' Well registered '
            ],200);
        }else
        {
            return response()->json([
                'fail'=>' Something wrong '
            ],404);
        }
    }

    public function Login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:5'
            ]);
        } catch (ValidationException $e) {
        }

        $user = User::where('email', $request->get('email'))->first();

        if($user)
        {
            if($user->password === $request->input('password'))
            {
                return response()->json([
                    'success' => ' LoggedIn successfully ',
                ],200);
            }else
            {
                return response()->json([
                    'failed' => ' Password invalid ',
                ],404);
            }
        }else{
            return response()->json([
                'failed' => ' Email not valid ',
            ],404);
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
     * @param  \Illuminate\Http\Request  $request
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
