<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\UserLMS;
use App\Models\Attendance;
use App\Models\UserLevelSection;
use Carbon\Carbon;



class AttendanceController extends Controller
{
    
    public function createAttendance(Request $request,$id)
    {
        $student = UserLevelSection::where('student-id',$id)->first();
        log::info($student);
        $level_Section_id = $student->levelSection_id;

        $attendance = new Attendance;
        $attendance->levelSectionId = $level_Section_id;
        $attendance->studentId = $id;
        $attendance->status = $request->status;
        $attendance->date = Carbon::now();

        $attendance->save();

        return response()->json([
            'message'=>'attendance created successfully!'
        ]);


    }

    public function getAttendancereport(Request $request){

        $absentName = Attendance::where([
            ['status', '=', 'absent'],
            ['levelSectionId', '=', $request->levelSectionId],
            ])
            ->get();
        
            
            return response()->json([
                'ids'=>$absentName
            ]);
    }
}
   
