<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\UserLMS;
use App\Models\Attendace;
use App\Models\LevelSection;
use Carbon\Carbon;



class AttendanceController extends Controller
{
    
    public function createAttendance(Request $request){

        $attendance = new Attendace;
        $attendance->levelSectionId = $request->levelSectionId;
        $attendance->status = $request->status;
        $attendance->studentId = $request->studentId;
        $attendance->date = Carbon::now();

        $attendance->save();

        return response()->json([
            'message'=>'attendance created successfully!'
        ]);


    }

    public function getAttendancereport(Request $request){

        $absentId = Attendace::where([
            ['status', '=', 'absent'],
            ['levelSectionId', '=', $request->levelSectionId]
            ])
            ->get();
        
            
            return response()->json([
                'ids'=>$absentId
            ]);
    }
}
   
