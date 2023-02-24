<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLMS;

class UserController extends Controller
{
    //
    public function addUser(Request $request){
        $user= new UserLMS;
        $firstName=$request->input('firstName');
        $lastName=$request->input('lastName');
        $email=$request->input('email');
        $password=$request->input('password');
        $role=$request->input('role');
        $phoneNumber=$request->input('phoneNumber');

        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        $user->role=$role;
        $user->phoneNumber=$phoneNumber;

        $user->save();

        return response()->json([
            'message'=>'User created successfully!'
        ]);

    }


   
