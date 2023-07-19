<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            User::create([
                'name' => $faker->sentence(3),
                'email'=> $faker->unique()->safeEmail,
                'password' => bcrypt('123456'),
            ]);
        }
    }
}
