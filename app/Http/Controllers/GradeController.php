<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $grades = Grade::latest()->get();

        return view('grade.index', compact('grades'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $grade = new Grade();
        $grade->name = $request->name;
        $grade->save();

        return redirect()->back()->with('success', 'Grade Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $grade = Grade::find($id);

        return view('grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $grade = Grade::find($id);
        $grade->name = $request->name;
        $grade->save();

        return redirect()->route('grade.index')->with('success', 'Grade Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $grade = Grade::find($id);

        if (!$grade) {
            return redirect()->back()->with('error', 'Grade not found.');
        }

        $grade->delete();

        return redirect()->back()->with('delete', 'Grade deleted successfully!');
    }
}
