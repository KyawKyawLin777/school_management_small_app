<?php

use App\Http\Controllers\GradeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentAddendanceController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherAssignController;
use App\Http\Controllers\UserController;
use App\Models\StudentAttendance;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //teacher
    Route::get('/user', [UserController::class, 'index']);
    Route::post('/user_store', [UserController::class, 'store']);
    Route::get('/user_delete/{id}', [UserController::class, 'delete']);
    Route::get('/user_edit/{id}', [UserController::class, 'edit']);
    Route::post('/user_update/{id}', [UserController::class, 'update']);

    // teacher assign
    Route::get('/teacher_assign/{id}', [TeacherAssignController::class, 'teacher_assign']);
    Route::post('/teacher_assign_store/{id}', [TeacherAssignController::class, 'teacher_assign_store']);
    Route::get('/teacher_assign_edit/{id}', [TeacherAssignController::class, 'edit']);
    Route::post('/teacher_assign_update/{id}', [TeacherAssignController::class, 'update']);
    Route::delete('/teacher_assign_delete/{id}', [TeacherAssignController::class, 'destroy']);



    //subject
    Route::resource('/subject', SubjectController::class);


    //grade
    Route::resource('/grade', GradeController::class);

    //student
    Route::resource('/student', StudentController::class);

    //student_attendance
    Route::resource('/student_attendance', StudentAddendanceController::class);
    Route::get('/get-attendance', [StudentAddendanceController::class, 'get_attendance'])->name('get.attendance');
    Route::get('/attendance_history/{id}', [StudentAddendanceController::class, 'history']);


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
