<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'name' => 'Đỗ Tiến Đại',
            'email' => 'dotiendai789@gmail.com',
            'password' => bcrypt('password123'), // Mật khẩu đã được mã hóa
            'phone' => '0123456789',
            'address' => '123 Đường ABC, TP. Hồ Chí Minh',
            'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
        ]);

        Customer::create([
            'name' => 'Lê Hoàng Thịnh',
            'email' => 'le.hamthang21@gmail.com',
            'password' => bcrypt('password123'), // Mật khẩu đã được mã hóa
            'phone' => '0123456789',
            'address' => '123 Đường ABC, TP. Hồ Chí Minh',
            'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
        ]);

        Customer::create([
            'name' => 'Trần Anh Tuấn',
            'email' => 'anhtuan2551104@gmail.com',
            'password' => bcrypt('password123'), // Mật khẩu đã được mã hóa
            'phone' => '0123456789',
            'address' => '123 Đường ABC, TP. Hồ Chí Minh',
            'token' => strtoupper(Str::random(10)), // Không có token khi tạo mới
        ]);
    }
}
