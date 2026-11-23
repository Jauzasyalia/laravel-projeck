<?php

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
});

it('shows the add student modal form on the index page', function () {
    Classroom::factory()->create(['name' => 'XI PPLG 1']);

    $this->get(route('admin.student.index'))
        ->assertOk()
        ->assertSee('Tambah Data Siswa')
        ->assertSee('Masukkan nama siswa')
        ->assertSee('-- Pilih Kelas --')
        ->assertSee(route('admin.student.store'), false);
});

it('stores a new student in the database', function () {
    $classroom = Classroom::factory()->create();

    $this->post(route('admin.student.store'), [
        'name' => 'Siswa Baru',
        'nis' => '12345',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Baru No. 1',
    ])->assertRedirect(route('admin.student.index'));

    $this->assertDatabaseHas('students', [
        'name' => 'Siswa Baru',
        'nis' => '12345',
        'classroom_id' => $classroom->id,
        'address' => 'Jl. Baru No. 1',
    ]);
});

it('rejects a new student with empty or duplicate data', function () {
    Student::factory()->create(['nis' => '55555']);

    $this->post(route('admin.student.store'), [
        'name' => '',
        'nis' => '55555',
        'classroom_id' => '',
        'address' => '',
    ])->assertSessionHasErrors(['name', 'nis', 'classroom_id', 'address']);

    expect(Student::count())->toBe(1);
});
