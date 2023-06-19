<?php

namespace App\Http\Controllers\Batch;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use Illuminate\Http\Request;

class BatchController extends Controller
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
        $batches = Batch::all();
        return view('batches.batches', compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'Augast', 'September', 'October', 'November', 'December'];
        $courses = Course::all();
        return view('batches.add_batches', compact('courses', 'month'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'course' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);
        $request->user()->batch()->create([
            'name' => $request->name,
            'course_id' => $request->course,
            'start' => $request->start,
            'end' => $request->end
        ]);
        return redirect()->route('batches.index')->with('success', 'Batch added successfully!');
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
    public function edit(Batch $batch)
    {
        $month = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Augast', 'September', 'October', 'November', 'December'];
        $courses = Course::all();
        return view('batches.edit_batches', compact('courses', 'month', 'batch'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Batch $batch, Request $request)
    {
        $batch->update([
            'name' => $request->name,
            'course_id' => $request->course,
            'start' => $request->start,
            'end' => $request->end,
        ]);
        return redirect()->route('batches.index')->with('update', 'Batch updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
        return back()->with('delete', 'Batch deleted successfully!');
    }
}
