<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Isi 10 mata pelajaran dari factory.
     */
    public function run(): void
    {
        Subject::factory(10)->create();
    }
}
