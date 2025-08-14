<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subjects = Subject::latest()->get();

        return view('subject.index', compact('subjects'));
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

        $subject = new Subject();
        $subject->name = $request->name;
        $subject->save();

        return redirect()->back()->with('success', 'Subject Added Successfully!');
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
        $subject = Subject::find($id);

        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->save();

        return redirect()->route('subject.index')->with('success', 'Subject Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $subject = Subject::find($id);

        if (!$subject) {
            return redirect()->back()->with('error', 'Subject not found.');
        }

        $subject->delete();

        return redirect()->back()->with('delete', 'Subject deleted successfully!');
    }
}
