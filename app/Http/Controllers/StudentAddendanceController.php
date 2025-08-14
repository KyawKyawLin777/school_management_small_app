<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentAddendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $attendances = StudentAttendance::whereDate('created_at', Carbon::today())
            ->latest()
            ->get();

        return view('student_attendance.index', compact('attendances'));
    }

    public function history($id)
    {
        $attendances = StudentAttendance::where('student_id', $id)
            ->latest()
            ->get();

        return view('student_attendance.history', compact('attendances'));
    }
    public function get_attendance(Request $request)
    {
        $students = Student::with('grade') // load grade relation
            ->where('name', 'like', '%' . $request->name . '%')
            ->select('id', 'name', 'grade_id', 'gr_no')
            ->get();

        return response()->json($students);
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

        $attendance = new StudentAttendance();
        $attendance->name = $request->name;
        $attendance->student_id = $request->student_id;
        $attendance->grade_id = $request->grade_id;
        $attendance->attendance = $request->attendance;
        $attendance->gr_no = $request->gr_no;
        $attendance->save();

        return redirect()->back()->with('success', 'Attendance Added Successfully!');
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

        $attendance = StudentAttendance::find($id);

        return view('student_attendance.edit', compact('attendance'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $attendance = StudentAttendance::find($id);
        $attendance->name = $request->name;
        $attendance->student_id = $request->student_id;
        $attendance->grade_id = $request->grade_id;
        $attendance->attendance = $request->attendance;
        $attendance->gr_no = $request->gr_no;

        return redirect()->route('student_attendance.index')->with('success', 'Attendance Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $attendance = StudentAttendance::find($id);
        $attendance->delete();

        return redirect()->back()->with('delete', 'Attendance Deleted Successfully!');
    }
}
