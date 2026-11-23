<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $students = Student::with('classroom')->get();

        return view('admin.student.index', [
            'title' => 'Students',
            'students' => $students,
            'classrooms' => Classroom::orderBy('name')->get(),
        ]);
    }

    /**
     * Simpan siswa baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nis' => ['required', 'string', 'max:20', 'unique:students,nis'],
            'classroom_id' => ['required', 'exists:classrooms,id'],
            'address' => ['required', 'string'],
        ], $this->validationMessages());

        Student::create($validated);

        return redirect()
            ->route('admin.student.index')
            ->with('success', 'Data siswa berhasil ditambahkan.');
    }

    /**
     * Pesan validasi berbahasa Indonesia untuk form siswa.
     *
     * @return array<string, string>
     */
    private function validationMessages(): array
    {
        return [
            'nis.required' => 'NIS wajib diisi.',
            'nis.max' => 'NIS maksimal 20 karakter.',
            'nis.unique' => 'NIS sudah digunakan.',
            'name.required' => 'Nama siswa wajib diisi.',
            'name.max' => 'Nama siswa maksimal 255 karakter.',
            'classroom_id.required' => 'Kelas wajib dipilih.',
            'classroom_id.exists' => 'Kelas tidak ditemukan.',
            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Format alamat tidak valid.',
        ];
    }
}
