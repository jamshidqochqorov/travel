<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Agent>
 */
class AgentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed
     */
    public function definition(): array
    {
        return [
            'firstname'=>fake()->firstName(),
            'lastname'=>fake()->lastName(),
            'phone'=>fake()->phoneNumber(),
            'promo_cod'=>fake()->unique()->numberBetween(1, 50000)
        ];
    }
}
