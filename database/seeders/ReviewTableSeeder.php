<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReviewTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create(); // Khởi tạo Faker để tạo dữ liệu ngẫu nhiên

        $reviews = [];

        // for ($i = 1; $i <= 5; $i++) {
        //     $reviews[] = [
        //         'id_product' => rand(1, 25), // Giả sử có 30 sản phẩm
        //         'id_customer' => rand(1, 2), // Giả sử có 10 khách hàng
        //         'comment' => $faker->text(200), // Bình luận ngẫu nhiên
        //         'rating' => rand(1, 5),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //     ];
        // }

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
