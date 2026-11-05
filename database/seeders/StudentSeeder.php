<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [
            [
                'name' => 'Ahmad Fauzan',
                'nis' => '20260001',
                'class' => 'XI PPLG 1',
                'address' => 'Jl. Sunan Kudus No. 10, Kudus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Muhammad Rizky',
                'nis' => '20260002',
                'class' => 'XI PPLG 1',
                'address' => 'Jl. Jenderal Sudirman No. 5, Kudus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Siti Nurhaliza',
                'nis' => '20260003',
                'class' => 'XI PPLG 1',
                'address' => 'Desa Jepang, Mejobo, Kudus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dimas Pratama',
                'nis' => '20260004',
                'class' => 'XI PPLG 2',
                'address' => 'Jl. Diponegoro No. 20, Kudus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Putri Amelia',
                'nis' => '20260005',
                'class' => 'XI PPLG 2',
                'address' => 'Desa Getas Pejaten, Jati, Kudus',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('students')->insert($students);
    }
}
