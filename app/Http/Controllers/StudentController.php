<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $grades = Grade::all();
        $students = Student::latest()->get();
        return view('student.index', compact('grades', 'students'));
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

        $student = new Student();
        $student->name = $request->name;
        $student->gr_no = $request->gr_no;
        $student->grade_id = $request->grade_id;
        $student->save();

        return redirect()->back()->with('success', 'Student Registered Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $student = Student::find($id);
        $grades = Grade::all();
        return view('student.edit', compact('student', 'grades'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $student = Student::find($id);
        $student->name = $request->name;
        $student->gr_no = $request->gr_no;
        $student->grade_id = $request->grade_id;
        $student->save();
        return redirect()->route('student.index')->with('success', 'Student Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('delete', 'Student Deleted Successfully!');
    }
}
