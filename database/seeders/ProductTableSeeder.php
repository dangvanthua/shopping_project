<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('product')->insert([
            'product_name' => ' Vi nu mau den',
            'id_category' => 1,
            'product_desc' => 'mo ta',
            'product_content' => 'Chi tiet',
            'product_price' => '100000',
            'product_image' => '1.jpg',
            'hot' => 1,
            'sale' => 0,
            'product_quantity' => 50,
            'product_status' => 0,
        ]);

        DB::table('product')->insert(
            [
                'product_name' => 'vi nu mau hong',
                'id_category' => 1,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '2.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,
            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'Giay vip',
                'id_category' => 2,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '3.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
        DB::table('product')->insert(
            [
                'product_name' => 'vi nam thoi trang',
                'id_category' => 1,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '4.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
        DB::table('product')->insert(
            [
                'product_name' => 'giay nu nhi nhanh',
                'id_category' => 2,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '5.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
        DB::table('product')->insert(
            [
                'product_name' => 'Giay vip',
                'id_category' => 2,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '6.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,
            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'Sieu pham giay',
                'id_category' => 2,
                'product_desc' => 'Mô tả sản phẩm 1',
                'product_content' => 'Chi tiết sản phẩm 1',
                'product_price' => '100000',
                'product_image' => '7.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,
            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'Giay dep',
                'id_category' => 2,
                'product_desc' => 'Mo  1',
                'product_content' => 'Chi 1',
                'product_price' => '100000',
                'product_image' => '8.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'Giay nu den',
                'id_category' => 2,
                'product_desc' => 'Mô tả sản phẩm 1',
                'product_content' => 'Chi tiết sản phẩm 1',
                'product_price' => '100000',
                'product_image' => '9.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,
            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'giay nam',
                'id_category' => 2,
                'product_desc' => 'Mo1',
                'product_content' => 'Chi  1',
                'product_price' => '100000',
                'product_image' => '10.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,
            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'Vi da cao cap',
                'id_category' => 1,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '11.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
        DB::table('product')->insert(
            [
                'product_name' => 'Ao vip pro',
                'id_category' => 3,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '14.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,
            ]
        );

        DB::table('product')->insert(
            [
                'product_name' => 'Ao duy nhat',
                'id_category' => 3,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '100000',
                'product_image' => '15.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
        DB::table('product')->insert(
            [
                'product_name' => 'Ao nu kute',
                'id_category' => 4,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '1000000',
                'product_image' => '12.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
        DB::table('product')->insert(
            [
                'product_name' => 'Ao nu thoi thuong',
                'id_category' => 4,
                'product_desc' => 'Mo ta',
                'product_content' => 'Chi tiet',
                'product_price' => '1000000',
                'product_image' => '12.jpg',
                'hot' => 1,
                'sale' => 0,
                'product_quantity' => 50,
                'product_status' => 0,



            ]
        );
    }
}
