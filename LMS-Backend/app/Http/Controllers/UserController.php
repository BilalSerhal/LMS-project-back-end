<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserLMS;

class UserController extends Controller
{


    //Add user
    public function addUser(Request $request){
        $user= new UserLMS;

        $request->validate(['firstName'=>'required',
        'lastName'=>'required',
        'email'=>'required',
        'password'=>'required',
        'role'=>'required',
        'phoneNumber'=>'required',
      ]);
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

    //get all users
    public function getUser(Request $request){
        $user=DB::table('user_l_m_s')->get();

        return response()->json([
            'message'=>$user
        ]);

    }

    public function getUserbyID(Request $request,$id){
        $user=UserLMS::find($id);

        return response()->json([
            'message'=>$user
        ]);

    }

    //update user information
    public function updateUser(Request $request,$id){
        $user=UserLMS::find($id);
        $user->firstName=$request->input('firstName');
        $user->lastName=$request->input('lastName');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->role=$request->input('role');
        $user->phoneNumber=$request->input('phoneNumber');
        $user->save();

        return response()->json([
             'message'=>'User Updated!!',
             'user'=>$user,
        ]);
    }

    //delete user
    public function deleteUser(Request $request,$id){
        $user=UserLMS::find($id);
        $user->delete();

        return response()->json([
            'message'=>'User Deleted',
        
        ]);

    }



   
    //serarch for user by name

    public function getbyName($firstName){

        return UserLMS::where('firstName','like','%'.$firstName.'%')->get() ;
       
    
    }

    //get all the teachers
    public function getTeacher() {
        $role="teacher";
        $users = DB::table('user_l_m_s')->where('role', $role)->get();
        return response()->json([ 'users'=> $users]);
   }


   //get all the students
   public function getStudent() {
    $role="student";
    $users = DB::table('user_l_m_s')->where('role', $role)->get();
    return response()->json([ 'users'=> $users]);
}

}
   
