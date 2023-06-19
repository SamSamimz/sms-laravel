<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return view('students.student', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.add_student', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required',
            'course' => 'required',
            'address' => 'required',
            'image' => 'required'
        ]);
        if ($request->hasFile('image')) {
            $img_path = $request->file('image')->store('public');
        }
        $request->user()->student()->create([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course,
            'phone' => $request->phone,
            'address' => $request->address,
            'image' => $img_path,
        ]);
        return back()->with('success', 'Student added successfully!');
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
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit_student', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Student $student, Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
            'course' => 'required',
            'address' => 'required'
        ]);
        if ($request->hasFile('image')) {
            unlink(public_path($student->image));
            $img_path = $request->file('image')->store('public');
            $request->user()->student()->update([
                'name' => $request->name,
                'email' => $request->email,
                'course_id' => $request->course,
                'phone' => $request->phone,
                'address' => $request->address,
                'image' => $img_path,
            ]);
        }
        $request->user()->student()->update([
            'name' => $request->name,
            'email' => $request->email,
            'course_id' => $request->course,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $image = public_path($student->image);
        if (file_exists($image)) {
            unlink($image);
        }
        $student->delete();
        return back()->with('delete', 'Student deleted successfully!');
    }
}
