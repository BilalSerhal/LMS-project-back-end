<?php

namespace App\Http\Controllers;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Section::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'sectionName' => 'required',
            'levelIds' => 'array', // Ensure levels IDs are provided in an array format
            'levelIds.*' => 'exists:levels,id', // Ensure each level ID exists in the levels table
            'capacity' => 'integer|nullable', // Add a capacity field that is optional and must be an integer
        ]);
    
        $section = Section::create($request->only('sectionName')); // Create the new section using only the sectionName field from the request
    
        $section->levels()->attach($request->input('levelIds'), ['capacity' => $request->input('capacity')]); // Associate the sections with the new level using the attach method, with the capacity field set to the provided value
    
        return $section; // Return the newly created section with its associated levels
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Section::with('levels')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $section = Section::find($id);
        $section->update($request->all());
        return $section;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Section::destroy($id);
    }
}