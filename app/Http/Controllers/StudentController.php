<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $selectedClass = request()->query('kelas');

        $students = Student::with('classroom')
            ->when($selectedClass, fn ($q) => $q->where('classroom_id', $selectedClass))
            ->get();

        return view('admin.students', [
            'title' => 'Students',
            'students' => $students,
            'classrooms' => Classroom::orderBy('name')->get(), // objek, bukan string
            'selectedClass' => $selectedClass,
        ]);
    }
}
