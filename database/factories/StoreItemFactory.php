<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreItem>
 */
class StoreItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->text(20),
            'descripcion' => fake()->sentence,
            'precio'=> rand(1,100000),
            'descuento'=> rand(0,20),
            'stock'=> rand(0,20000),
            'imagen' => 'https://loremflickr.com/320/240?random=' . rand(1,100),
        ];
    }
}
