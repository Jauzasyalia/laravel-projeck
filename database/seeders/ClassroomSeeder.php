<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // <-- Tambahkan baris ini!

class ClassroomSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = [
            ['name' => '10 PPLG 1', 'major' => 'PPLG', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '11 PPLG 1', 'major' => 'PPLG', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '12 PPLG 1', 'major' => 'PPLG', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '10 ANIMASI 1', 'major' => 'ANIMASI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '11 ANIMASI 1', 'major' => 'ANIMASI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '12 ANIMASI 1', 'major' => 'ANIMASI', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '10 DKV 2', 'major' => 'DKV', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '11 DKV 2', 'major' => 'DKV', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '12 DKV 2', 'major' => 'DKV', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '10 PPLG 2', 'major' => 'PPLG', 'created_at' => now(), 'updated_at' => now()],
        ];

        DB::table('classrooms')->insert($classrooms);
    }
}
