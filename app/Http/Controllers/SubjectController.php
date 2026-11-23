<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SubjectController extends Controller
{
    public function index(): View
    {
        $subjects = Subject::orderBy('name')->get();

        return view('admin.subject.index', [
            'title' => 'Subjects',
            'subjects' => $subjects,
        ]);
    }

    /**
     * Simpan mata pelajaran baru ke database.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:subjects,name'],
        ], $this->validationMessages());

        Subject::create($validated);

        return redirect()
            ->route('admin.subject.index')
            ->with('success', 'Data mata pelajaran berhasil ditambahkan.');
    }

    /**
     * @return array<string, string>
     */
    private function validationMessages(): array
    {
        return [
            'name.required' => 'Nama mata pelajaran wajib diisi.',
            'name.max' => 'Nama mata pelajaran maksimal 255 karakter.',
            'name.unique' => 'Mata pelajaran sudah ada.',
        ];
    }
}
