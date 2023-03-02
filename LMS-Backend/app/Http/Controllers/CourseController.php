<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Course::all();
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "subject" => "required",
        ]);


        return Course::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return "zeinab";
        return Course::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Course::find($id);
        if ($course){
            $fields = $request->validate([
                "subject" => "required",
            ]);
            $course -> update($fields);
            $updatedCourse=Course::find($id);
            return $updatedCourse;
        }
        else{
            return ['message' =>'Course not found'];
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        $course=Course::find($id);
        if ($course){
            $course->delete();
            return ['message'=>'Course have been deleted '];

        }
        else {
            return ['message'=>'Course not found'];
        }
    }
 /**
     * Search for specified course from storage.
     */
    public function search($subject){
        return Course::where('subject','like','%'.$subject.'%')->get();
    }

}

