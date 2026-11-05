<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::with('teacher')->orderBy('name')->get();

        return view('admin.subjects', [
            'title' => 'Subjects',
            'subjects' => $subjects,
        ]);
    }
}
