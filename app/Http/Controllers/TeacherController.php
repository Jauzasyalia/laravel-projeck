<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TeacherController extends Controller
{
    public function index(): View
    {
        $teachers = Teacher::with('subject')->orderBy('name')->get();

        return view('admin.teacher.index', [
            'title' => 'Teachers',
            'teachers' => $teachers,
            // semua mapel dari menu Subjects
            'subjects' => Subject::orderBy('name')->get(),
        ]);
    }

    /**
     * Simpan guru baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'niy' => ['required', 'digits:10', 'unique:teachers,niy'],
            'subject_id' => ['required', 'exists:subjects,id', 'unique:teachers,subject_id'],
            'start_date' => ['required', 'date'],
        ], $this->validationMessages());

        Teacher::create($validated);

        return redirect()
            ->route('admin.teacher.index')
            ->with('success', 'Data guru berhasil ditambahkan.');
    }

    /**
     * @return array<string, string>
     */
    private function validationMessages(): array
    {
        return [
            'name.required' => 'Nama guru wajib diisi.',
            'name.max' => 'Nama guru maksimal 255 karakter.',
            'niy.required' => 'NIY wajib diisi.',
            'niy.digits' => 'NIY harus 10 digit angka.',
            'niy.unique' => 'NIY sudah digunakan.',
            'subject_id.required' => 'Mata pelajaran wajib dipilih.',
            'subject_id.exists' => 'Mata pelajaran tidak ditemukan.',
            'subject_id.unique' => 'Mata pelajaran ini sudah memiliki guru.',
            'start_date.required' => 'Tanggal mulai wajib diisi.',
            'start_date.date' => 'Format tanggal tidak valid.',
        ];
    }
}
