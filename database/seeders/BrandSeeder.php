<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 2; $i++) {
            Brand::create([
                'brand_name' => $faker->unique()->sentence(2),
                'description'=> $faker->paragraph(2),
                
            ]);
        }
    }
}
