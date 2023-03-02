<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\UserLMS;
use App\Models\LevelSection;
use App\Models\UserLevelSection;
use App\Models\Section;
use App\Models\Level;

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
      
          // Retrieve the level and section IDs based on their names
    $levelName = $request->input('levelName');
    $sectionName = $request->input('sectionName');
    $level = Level::where('levelName', $levelName)->first();
    $section = Section::where('sectionName', $sectionName)->first();

    // Create the user level section record
    $userLevelSection = new UserLevelSection;
    if ($user->role == 'student') {
        $userLevelSection->student_id = $user->id;
       } else if ($user->role == 'teacher') {
        $userLevelSection->teacher_id = $user->id;
       }
    $userLevelSection->levelSection_id = $level->sections()->where('section_id', $section->id)->first()->id;

    $user->save();
    $userLevelSection->save();
    log::info($userLevelSection->levelSection_id);
    log::info("$$$$$$$$$$$$$$$$$");
   
   $userLevelSection->levelSection_id = $userLevelSection->levelSection_id;
    $userLevelSection->save();
        
        return response()->json([
            'message'=>'User created successfully!'
        ]);

    }

    public function getUser(Request $request){
        $user=DB::table('user_l_m_s')->get();

        return response()->json([
            'message'=>$user
        ]);

    }
}
   
