<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('review')->insert([
            [
                'id_product' => 1,
                'id_customer' => 1,
                'comment' => 'Sản phẩm rất tốt, đúng như mô tả.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 2,
                'id_customer' => 2,
                'comment' => 'Chất lượng sản phẩm tuyệt vời.',
                'rating' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 3,
                'id_customer' => 3,
                'comment' => 'Dịch vụ tốt và giao hàng nhanh.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 1,
                'id_customer' => 4,
                'comment' => 'Giá hợp lý và chất lượng.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 2,
                'id_customer' => 5,
                'comment' => 'Rất hài lòng với sản phẩm.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 3,
                'id_customer' => 6,
                'comment' => 'Sẽ quay lại mua lần sau.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 1,
                'id_customer' => 7,
                'comment' => 'Chất lượng sản phẩm tuyệt vời.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 2,
                'id_customer' => 8,
                'comment' => 'Đáng tiền và rất hài lòng.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 3,
                'id_customer' => 9,
                'comment' => 'Tuyệt vời! Sẽ giới thiệu cho bạn bè.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_product' => 1,
                'id_customer' => 10,
                'comment' => 'Không có gì để phàn nàn, quá tốt.',
                'rating' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
