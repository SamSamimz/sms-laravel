<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Batch\BatchController;
use App\Http\Controllers\Courses\CoursesController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Teacher\TeacherController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', HomeController::class);
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    //__Students
    Route::resource('students', StudentController::class);

    //__Teachers Routes
    Route::resource('teachers', TeacherController::class);

    //__Courses Routes
    Route::resource('courses', CoursesController::class);


    //__Batches Routes
    Route::resource('batches', BatchController::class);
});
//__Login Rutes
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'store'])->name('login.post');
});
