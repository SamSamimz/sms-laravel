<?php

namespace App\Http\Controllers\Courses;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $course = Course::all();
        return view('courses.course', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('courses.add_course');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $course = $request->validate([
            'name' => 'required|min:4',
            'syllabus' => 'required',
            'duration' => 'required'
        ]);
        $request->user()->course()->create($course);
        return back()->with('success', 'Course added successfully!');
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
    public function edit(Course $course)
    {
        return view('courses.edit_course', [
            'course' => $course,
        ]);
        // dd($course);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Course $course, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:4',
            'syllabus' => 'required',
            'duration' => 'required'
        ]);
        $course->update($data);
        return redirect()->route('courses.index')->with('update', 'Course update successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return back()->with('delete', 'Course deleted successfylly!');
    }
}
