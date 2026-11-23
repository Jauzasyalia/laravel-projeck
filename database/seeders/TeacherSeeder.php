<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Setiap mata pelajaran yang sudah ada diajar oleh 1 guru dari factory.
     */
    public function run(): void
    {
        Subject::all()->each(
            fn (Subject $subject) => Teacher::factory()->for($subject)->create()
        );
    }
}
