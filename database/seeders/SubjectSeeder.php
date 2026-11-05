<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Isi 10 mapel dan 10 guru dari factory (1 mapel = 1 guru).
     */
    public function run(): void
    {
        Subject::factory(10)
            ->hasTeacher(1)
            ->create();
    }
}
