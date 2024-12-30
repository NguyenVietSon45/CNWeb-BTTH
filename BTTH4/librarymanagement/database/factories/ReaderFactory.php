<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reader>
 */
class ReaderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->sentence(3),
            'birthday'=>fake()->dateTimeBetween('-70 years', '-20 years')->format('Y-m-d'),
            'address'=>fake()->sentence(2),
            'phone'=>fake()->phoneNumber(),
        ];
    }
}
