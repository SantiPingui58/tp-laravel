<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->unique()->word,
        ];
    }

    public function ropa()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Ropa',
            ];
        });
    }

    public function comida()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Comida',
            ];
        });
    }

    public function electrodomesticos()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Electrodomésticos',
            ];
        });
    }

    public function tecnologia()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Tecnología',
            ];
        });
    }

    public function hogar()
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Hogar',
            ];
        });
    }
}
