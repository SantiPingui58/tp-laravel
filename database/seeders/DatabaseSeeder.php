<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(20)->create();

         Category::factory()->ropa()->create();
        Category::factory()->comida()->create();
        Category::factory()->electrodomesticos()->create();
        Category::factory()->tecnologia()->create();
        Category::factory()->hogar()->create();
    }
}
