<?php

namespace Database\Factories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeacherFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'niy' => fake()->unique()->numberBetween(1000000000, 9999999999), // 10 digit
            'subject_id' => Subject::factory(),
            'start_date' => fake()->date(),
        ];
    }
}
