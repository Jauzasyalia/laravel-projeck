<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Data lama (menu Classroom & Student), biarkan atau komentari
        Classroom::factory(4)
            ->hasStudents(10) // setiap classroom memiliki 10 student
            ->create();

        // Data baru: 10 subject, masing-masing punya 1 teacher
        $this->call(SubjectSeeder::class);
    }
}
