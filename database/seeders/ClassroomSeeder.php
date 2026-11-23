<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Isi 4 kelas dari factory.
     */
    public function run(): void
    {
        Classroom::factory(4)->create();
    }
}
