<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $reviews = [];

        $reviews = [
            'id_product' => 1, // Giả sử có 30 sản phẩm
            'id_customer' => 1, // Giả sử có 10 khách hàng
            'comment' => $faker->text(200), // Bình luận ngẫu nhiên
            'rating' => rand(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        DB::table('review')->insert($reviews);
    }
}
