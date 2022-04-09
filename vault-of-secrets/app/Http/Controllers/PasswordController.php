<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // All Posts
        $passwords = Password::all();
        // Return Json Response
        return response()->json([
            'passwords' => $passwords
        ],200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PasswordStoreRequest $request)
    {
        try {
            // Create Password
            Password::create([
                'service' => $request->service,
                'password' => $request->password
            ]);
            // Return Json Response
            return response()->json([
                'message' => "Password successfully created."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Password Detail 
        $password = Password::find($id);
        if(!$password){
            return response()->json([
                'message'=>'Password Not Found.'
            ],404);
        }
        // Return Json Response
        return response()->json([
            'password' => $password
        ],200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PasswordStoreRequest $request, $id)
    {
        try {
            // Find Password
            $password = Password::find($id);
            if(!$password){
              return response()->json([
                'message'=>'Password Not Found.'
              ],404);
            }
            $password->service = $request->service;
            $password->password = $request->password;

            // Update Post
            $password->save();
            // Return Json Response
            return response()->json([
                'message' => "Password successfully updated."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => "Something went really wrong!"
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Password Detail 
        $password = Password::find($id);
        if(!$password){
        return response()->json([
            'message'=>'Password Not Found.'
        ],404);
        }
        // Delete Password
        $password->delete();
        // Return Json Response
        return response()->json([
            'message' => "Password successfully deleted."
        ],200);
    }
}
