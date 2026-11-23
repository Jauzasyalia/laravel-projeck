<?php

use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/layout', function () {
    return view('layout');
});

Route::prefix('admin')
    ->group(function () {
        // STUDENT
        Route::get('/student', [StudentController::class, 'index'])
            ->name('admin.student.index');

        Route::post('/student', [StudentController::class, 'store'])
            ->name('admin.student.store');

        // CLASSROOM
        Route::get('/classroom', [ClassroomController::class, 'index'])
            ->name('admin.classroom.index');

        Route::post('/classroom', [ClassroomController::class, 'store'])
            ->name('admin.classroom.store');

        // TEACHER
        Route::get('/teachers', [TeacherController::class, 'index'])
            ->name('admin.teacher.index');

        Route::post('/teachers', [TeacherController::class, 'store'])
            ->name('admin.teacher.store');

        // SUBJECT
        Route::get('/subjects', [SubjectController::class, 'index'])
            ->name('admin.subject.index');

        Route::post('/subjects', [SubjectController::class, 'store'])
            ->name('admin.subject.store');
    });
