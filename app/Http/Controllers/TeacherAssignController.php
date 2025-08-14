<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Subject;
use App\Models\TeacherAssign;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherAssignController extends Controller
{
    public function teacher_assign($id)
    {

        $teacher = User::find($id);
        $assigns = TeacherAssign::where('teacher_id', $id)->get();
        $grades = Grade::all();
        $subjects = Subject::all();

        return view('teacher_assign.index', compact('assigns', 'grades', 'subjects', 'teacher'));
    }

    public function teacher_assign_store(Request $request, $id)
    {
        $assign = new TeacherAssign();
        $assign->teacher_id = $id;
        $assign->grade_id = $request->grade_id;
        $assign->subject_id = $request->subject_id;
        $assign->save();
        return redirect()->back()->with('success', 'Teacher Assign Successfully!');
    }

    public function edit($id)
    {

        $assign = TeacherAssign::find($id);
        $grades = Grade::all();
        $subjects = Subject::all();
        return view('teacher_assign.edit', compact('assign', 'grades', 'subjects'));
    }

    public function update(Request $request, $id)
    {
        $assign = TeacherAssign::find($id);
        $assign->grade_id = $request->grade_id;
        $assign->subject_id = $request->subject_id;
        $assign->save();
        return redirect(url('teacher_assign', $assign->teacher_id))->with('success', 'Teacher Assign Updated Successfully!');
    }

    public function destroy($id)
    {
        $assign = TeacherAssign::find($id);
        $assign->delete();
        return redirect()->back()->with('delete', 'Teacher Assign Deleted Successfully!');
    }
}
