<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClassroomController extends Controller
{
    public function index(): View
    {
        $classrooms = Classroom::with('students')->orderBy('name')->get();

        return view('admin.classroom.index', [
            'title' => 'Classroom',
            'classrooms' => $classrooms,
        ]);
    }

    /**
     * Simpan kelas baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:20', 'unique:classrooms,name'],
            'major' => ['required', 'string', 'max:15'],
        ], $this->validationMessages());

        Classroom::create($validated);

        return redirect()
            ->route('admin.classroom.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * @return array<string, string>
     */
    private function validationMessages(): array
    {
        return [
            'name.required' => 'Nama kelas wajib diisi.',
            'name.max' => 'Nama kelas maksimal 20 karakter.',
            'name.unique' => 'Nama kelas sudah digunakan.',
            'major.required' => 'Jurusan wajib diisi.',
            'major.max' => 'Jurusan maksimal 15 karakter.',
        ];
    }
}
