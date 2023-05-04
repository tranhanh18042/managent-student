<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'subject_sections_id' => fake() -> numberBetween(1,10),
            'subject_name' => fake()->name(),
            'teacher_id' => fake() -> numberBetween(1,10),
            'start_date' => new \DateTime('now'),
            'end_date' => fake()->date(),
        ];
    }
}
