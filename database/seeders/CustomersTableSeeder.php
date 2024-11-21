<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomersTableSeeder extends Seeder
{
    public function run()
    {
        // Thêm khách hàng vào bảng customers
        DB::table('customers')->insert(
            [
                'name' => 'Đỗ Tiến Đại',
                'email' => 'dotiendai789@gmail.com',
                'password' => bcrypt('password123'),
                'phone' => '0123456789',
                'address' => '123 Đường ABC, TP. Hồ Chí Minh',
                'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
            ],
            [
                'name' => 'Lê Hoàng Thịnh',
                'email' => 'le.hamthang21@gmail.com',
                'password' => bcrypt('password123'), // Mật khẩu đã được mã hóa
                'phone' => '0123456789',
                'address' => '123 Đường ABC, TP. Hồ Chí Minh',
                'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
            ],
            [
                'name' => 'Trần Anh Tuấn',
                'email' => 'anhtuan2551104@gmail.com',
                'password' => bcrypt('password123'), // Mật khẩu đã được mã hóa
                'phone' => '0123456789',
                'address' => '123 Đường ABC, TP. Hồ Chí Minh',
                'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
            ],
            [
                'name' => 'Dang Van Thuan',
                'email' => 'thuandang021102@gmail.com',
                'password' => bcrypt('password123'), // Mật khẩu đã được mã hóa
                'phone' => '0123456789',
                'address' => '123 Đường ABC, TP. Hồ Chí Minh',
                'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
            ]
        );
    }
}
