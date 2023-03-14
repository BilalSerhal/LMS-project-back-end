<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Models\UserLMS;
use App\Models\Attendance;
use App\Models\User;
use App\Models\UserLevelSection;
use Carbon\Carbon;



class AttendanceController extends Controller
{
    
    public function createAttendance(Request $request,$id)
    {
        $student = UserLevelSection::where('student_id',$id)->first();
        log::info($student);
        $level_Section_id = $student->levelSection_id;

        $attendance = new Attendance;
        $attendance->levelSection_id = $level_Section_id;
        $attendance->studentId = $id;
        $attendance->status = $request->status;
        $attendance->date = Carbon::now();

        $attendance->save();

        return response()->json([
            'message'=>'attendance created successfully!'
        ]);


    }

    


    public function getAttendance(){
        $studentsSituation=DB::table('attendances')
        ->join('user_l_m_s','attendances.studentId','=','user_l_m_s.id')
        ->select('user_l_m_s.firstName')
        ->where('attendances.status', '=', 'Absent')
        ->get();
        return response()->json([
            'ids'=>$studentsSituation
        ]);
    }


    public function getAttendanceSection(Request $request,$id){
        $sectionSituation=DB::table('attendances')
        ->join('user_l_m_s','attendances.studentId','=','user_l_m_s.id')
        ->select('user_l_m_s.firstName')
        ->where('attendances.status', '=', 'Absent')
        ->where('attendances.levelSectionId', '=' , $id)
        ->get();
        return response()->json([
            $sectionSituation
        ]);
    }


    public function getAttendanceName(Request $request,$id){
        $studentSituation=DB::table('attendances')
        ->select('attendances.status','attendances.date')
        ->where('attendances.studentId','=',$id)
        ->get();
        return response()->json([
            $studentSituation
        ]);
        


    }


    public function getAttendanceByDate(Request $request,$id){
        $attendanceDate=DB::table('attendances')
        ->join('user_l_m_s','attendances.studentId','=','user_l_m_s.id')
        ->select('user_l_m_s.firstName','attendances.status')
        ->where('attendances.levelSectionId', '=' , $id)
        ->get();
        return response()->json([
            $attendanceDate
        ]);
    }


    public function updateAttendance(Request $request,$id){
        $update=Attendance::find($id);
        $update->status=$request->status ? $request->status: $update->status;
        $update->save();
        return response()->json([
            'message'=>'updated',
            'update'=>$update,
        ]);
    }

}

