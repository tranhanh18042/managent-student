<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserSubject>
 */
class UserSubjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 10),
            'subject_id' => fake()->numberBetween(1, 10),
            'score_process' => fake()->numberBetween(0, 10),
            'score_test' => fake()->numberBetween(0, 10), 
        ];
    }
}
