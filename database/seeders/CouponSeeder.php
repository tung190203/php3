<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            $expirationTime = $faker->date();
            $formattedExpirationTime = date('Y-m-d', strtotime($expirationTime));
            Coupon::create([
                'code' => $faker->sentence(1),
                'discount'=> $faker->randomFloat(null,2,10),
                'expiration_time'=> $formattedExpirationTime,
            ]);
        }
    }
}
