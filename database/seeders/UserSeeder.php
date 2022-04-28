<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    use WithFaker;
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        User::createWithAttributes([
            'name' => 'Thiha',
            'email' => 'thiha@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make("password"),
            'address'   => 'Asoke',
            'phone' => '06777779',
            'remember_token' => Str::random(10),
        ]);
        for($i = 0; $i < 10; $i++) {
            User::createWithAttributes([
                'name'  => $this->faker->name(),
                'email' => $this->faker->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'address'   => $this->faker->address(),
                'phone' => $this->faker->phoneNumber(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
