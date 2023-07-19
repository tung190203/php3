<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];
        $faker = Faker::create();
        for ($i = 0; $i < 20; $i++) {
            $randomSizes = $faker->randomElements($sizes, $count = 2);
            DB::table('products')->insert([
                'name' => $faker->sentence(3),
                'amount'=> $faker->randomFloat(2,10,100),
                'description'=> $faker->paragraph(2),
                'price'=> $faker->randomFloat(2,10,100),
                'images'=> $faker->imageUrl(640,480),
                'brand_id'=>$faker->randomFloat(null,1,2),
                'category_id'=>$faker->randomFloat(null,1,2),
                'size'=>json_encode($randomSizes),
            ]);
        }
    }
}
