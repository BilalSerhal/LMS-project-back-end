<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserLMS;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{


    //Add user
    public function addUser(Request $request){
        $user= new UserLMS;

        $request->validate([
        'firstName'=>'required',
        'lastName'=>'required',
        'email'=>'required|unique:users,email',
        'password'=>'required',
        'role'=>'required',
        'phoneNumber'=>'required',
      ]);
        $firstName=$request->input('firstName');
        $lastName=$request->input('lastName');
        $email=$request->input('email');
        // $password=$request->input('password');
        $password= Hash::make($request->password);
        $role=$request->input('role');
        $phoneNumber=$request->input('phoneNumber');
        
        $user->firstName=$firstName;
        $user->lastName=$lastName;
        $user->email=$email;
        $user->password=$password;
        $user->role=$role;
        $user->phoneNumber=$phoneNumber;
        

        $user->save();
       
        
            $token=$user->createToken('superadmintoken')->plainTextToken;
            
        
        
        return response()->json([
            'message'=>'User created successfully!',
            'token'=>$token,
        ]);
        
        }

    

    //get all users
    public function getUser(Request $request){
        $user=DB::table('user_l_m_s')->get();
        
        return response()->json([
            'message'=>$user,
           
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


public function logout(Request $request){
    auth()->user()->tokens()->delete();

    return response()->json([ 'message'=> 'Logged out Successfully!!']);
}

public function login(Request $request){
    $fields=$request->validate(
        [
            'email'=>'required|unique:users,email',
            'password'=>'required'
        ]
        );
        //check email
        $user=UserLMS::where('email',$fields['email'])->first();

        //check password
    
        if(! $user|| ! Hash::check($fields['password'],$user->password)){
            return response()->json([
                'message'=>'Bad creds'
            ],401);
        }
        $token=$user->createToken('superadmintoken')->plainTextToken;
            
        
        
        return response()->json([
            'message'=>'Loggedin Successfully',
            'token'=>$token,
        ]);
}

}
   
