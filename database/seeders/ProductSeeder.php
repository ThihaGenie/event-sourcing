<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\WithFaker;

class ProductSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->setUpFaker();
        for($i = 0; $i < 20; $i++) {
            Product::createWithAttributes([
                'name'  => $this->faker->name(),
                'unit_price' => $this->faker->randomFloat(2, 100, 30000),
                'unit_count' => $this->faker->numberBetween(10, 200)
            ]);
        }
    }
}
