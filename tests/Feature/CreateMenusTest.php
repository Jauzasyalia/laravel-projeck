<?php

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->withoutVite();
});

// ---------- Classroom

it('stores a new classroom in the database', function () {
    $this->post(route('admin.classroom.store'), ['name' => 'XI PPLG 9', 'major' => 'PPLG'])
        ->assertRedirect(route('admin.classroom.index'));

    $this->assertDatabaseHas('classrooms', ['name' => 'XI PPLG 9', 'major' => 'PPLG']);
});

it('rejects a classroom with an empty or duplicate name', function () {
    Classroom::factory()->create(['name' => 'XI PPLG 1']);

    $this->post(route('admin.classroom.store'), ['name' => '', 'major' => ''])
        ->assertSessionHasErrors(['name', 'major']);

    $this->post(route('admin.classroom.store'), ['name' => 'XI PPLG 1', 'major' => 'PPLG'])
        ->assertSessionHasErrors(['name']);
});

// ---------- Subject

it('stores a new subject without any teacher field', function () {
    $this->get(route('admin.subject.index'))
        ->assertOk()
        ->assertDontSee('Nama Guru')
        ->assertDontSeeHtml('>Teacher</th>');

    $this->post(route('admin.subject.store'), ['name' => 'Matematika'])
        ->assertRedirect(route('admin.subject.index'));

    $this->assertDatabaseHas('subjects', ['name' => 'Matematika']);
    expect(Teacher::count())->toBe(0);
});

it('rejects a subject with an empty or duplicate name', function () {
    Subject::factory()->create(['name' => 'Fisika']);

    $this->post(route('admin.subject.store'), ['name' => ''])->assertSessionHasErrors(['name']);
    $this->post(route('admin.subject.store'), ['name' => 'Fisika'])->assertSessionHasErrors(['name']);
});

// ---------- Teacher

it('stores a new teacher linked to a subject', function () {
    $subject = Subject::factory()->create();

    $this->post(route('admin.teacher.store'), [
        'name' => 'Guru Baru',
        'niy' => '1234567890',
        'subject_id' => $subject->id,
        'start_date' => '2025-01-15',
    ])->assertRedirect(route('admin.teacher.index'));

    $teacher = Teacher::where('niy', 1234567890)->firstOrFail();

    expect($teacher->subject->is($subject))->toBeTrue()
        ->and($subject->fresh()->teacher->is($teacher))->toBeTrue();
});

it('does not allow a second teacher for the same subject', function () {
    $subject = Subject::factory()->create();
    Teacher::factory()->for($subject)->create();

    $this->post(route('admin.teacher.store'), [
        'name' => 'Guru Kedua',
        'niy' => '9999999999',
        'subject_id' => $subject->id,
        'start_date' => '2025-01-15',
    ])->assertSessionHasErrors(['subject_id']);

    expect(Teacher::count())->toBe(1);
});

it('requires a 10 digit niy for a teacher', function () {
    $subject = Subject::factory()->create();

    $this->post(route('admin.teacher.store'), [
        'name' => 'Guru Baru',
        'niy' => '12345',
        'subject_id' => $subject->id,
        'start_date' => '2025-01-15',
    ])->assertSessionHasErrors(['niy']);
});

// ---------- Relationship

it('links a student to its classroom and a classroom to its students', function () {
    $classroom = Classroom::factory()->create();
    $student = Student::factory()->for($classroom)->create();

    expect($student->classroom->is($classroom))->toBeTrue()
        ->and($classroom->students)->toHaveCount(1);
});

// ---------- Seeder

it('seeds every menu from factories with one teacher per subject', function () {
    $this->seed();

    expect(Classroom::count())->toBe(4)
        ->and(Student::count())->toBe(40)
        ->and(Subject::count())->toBe(10)
        ->and(Teacher::count())->toBe(10)
        ->and(Subject::doesntHave('teacher')->count())->toBe(0)
        ->and(Teacher::whereBetween('niy', [1000000000, 9999999999])->count())->toBe(10);
});
