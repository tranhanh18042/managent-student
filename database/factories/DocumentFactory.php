<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => fake()->numberBetween(1,2),
            'name_documents' => fake()->text(),
            'link_documents' => 'http://media.w3.org/2010/05/sintel/trailer.webm',
            'subject_sections_id' => fake() -> numberBetween(1,10),
        ];
    }
}
