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
            'name' => fake()->text(20),
            'description' => fake()->sentence,
            'price'=> rand(1,100000),
            'disccount'=> rand(0,20),
            'stock'=> rand(0,20000),
            'image_id' => rand(1,10),
            'category_id' => rand(1,5),
        ];
    }
}
