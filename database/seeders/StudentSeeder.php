<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Isi 10 siswa dari factory untuk setiap kelas yang sudah ada.
     */
    public function run(): void
    {
        Classroom::all()->each(
            fn (Classroom $classroom) => Student::factory(10)->for($classroom)->create()
        );
    }
}
