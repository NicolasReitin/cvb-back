<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Actualite>
 */
class ActualiteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titre' => fake()->lastName(),
            'content' => fake()->realTextBetween($minNbChars = 50, $maxNbChars = 100, $indexSize = 2),
            'auteur' => fake()->name(),
            'photo' => null,
            'equipe_jeune_id' => null,
            'equipe_senior_id' => null,
        ];
    }
}
