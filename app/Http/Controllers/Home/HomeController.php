<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Batch;
use App\Models\Course;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __construct()
    {
        return $this->middleware(['auth']);
    }
    public function __invoke(Request $request)
    {
        $teacher = Teacher::all();
        $student = Student::all();
        $course = Course::all();
        $batch = Batch::all();
        return view('index', compact('teacher', 'student', 'course', 'batch'));
    }
}
