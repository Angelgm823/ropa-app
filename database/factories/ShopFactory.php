<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Shop>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->words(4, true),
            'slogan' => fake()->sentence(),
            'telefono' => fake()->phoneNumber(),
            'correo' => fake()->unique()->safeEmail(),
            'direccion' => fake()->address(),
            'ciudad' => fake()->city(),
        ];
    }
}
