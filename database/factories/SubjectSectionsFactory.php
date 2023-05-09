<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SubjectSectionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->name(),
            'stt' => fake()->numberBetween(1,10),
            'video_url' => 'http://media.w3.org/2010/05/sintel/trailer.webm',
            'description' => fake()->text(),
            'subject_id' => fake() -> numberBetween(1,10),
        ];
    }
}
