<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\Password;
use App\Http\Requests\PasswordStoreRequest;

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
        $letters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%^&*()";
        $password = "";
        for ($i = 0; $i < 20; $i+=1)
        {
            $password .= substr($letters, rand(0, strlen($letters)), 1);
        }

        $password = Crypt::encryptString($password);

        try {
            // Create Password
            Password::create([
                'service' => $request->service,
                'password' => $password
            ]);

            // $user = User::find(1);

            // $user->passwords()->create([
            //     'service' => $request->service,
            //     'password' => $password
            // ]);

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
        $password->password = Crypt::decrypt($password->password, false);
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
        // try {
        //     // Find Password
        //     $password = Password::find($id);
        //     if(!$password){
        //       return response()->json([
        //         'message'=>'Password Not Found.'
        //       ],404);
        //     }
        //     $password->service = $request->service;
        //     $password->password = $request->password;

        //     // Update Post
        //     $password->save();
        //     // Return Json Response
        //     return response()->json([
        //         'message' => "Password successfully updated."
        //     ],200);
        // } catch (\Exception $e) {
        //     // Return Json Response
        //     return response()->json([
        //         'message' => "Something went really wrong!"
        //     ],500);
        // }
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
