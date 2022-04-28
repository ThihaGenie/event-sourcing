<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for($i = 0; $i < 20; $i++) {
            Product::createWithAttributes([
                'name'  => $faker->name(),
                'unit_price' => $faker->randomFloat(2, 100, 30000),
                'unit_count' => $faker->numberBetween(10, 200)
            ]);
        }
    }
}
