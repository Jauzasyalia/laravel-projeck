<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::with('subject')->orderBy('name')->get();

        return view('admin.teachers', [
            'title' => 'Teachers',
            'teachers' => $teachers,
        ]);
    }
}
