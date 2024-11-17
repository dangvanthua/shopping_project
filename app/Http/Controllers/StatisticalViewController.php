<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StatisticalViewController extends Controller
{
    //
    public function showStatisticalView(Request $request)
    {
        // Bộ lọc tháng và năm
        $month = $request->get('month', now()->month);
        $year = $request->get('year', now()->year);

        // 1. Biểu đồ doanh thu (giả lập dữ liệu hoặc truy vấn thực)
        $chartData = json_encode([
            'days' => ['01', '02', '03', '04', '05'], // Ngày trong tháng
            'revenue' => [500000, 700000, 800000, 600000, 900000], // Doanh thu
        ]);

        // 2. Biểu đồ trạng thái đơn hàng
        $statusData = json_encode([
            ['name' => 'Pending', 'y' => 35],
            ['name' => 'Completed', 'y' => 50],
            ['name' => 'Cancelled', 'y' => 15],
        ]);

        // 3. Doanh số hàng ngày
        $dailyRevenue = [
            ['day' => "$year-$month-01", 'revenue' => 500000],
            ['day' => "$year-$month-02", 'revenue' => 700000],
            ['day' => "$year-$month-03", 'revenue' => 800000],
            ['day' => "$year-$month-04", 'revenue' => 600000],
            ['day' => "$year-$month-05", 'revenue' => 900000],
        ];
        $totalRevenue = array_sum(array_column($dailyRevenue, 'revenue'));

        // 4. Top khách hàng
        $topCustomers = [
            ['name' => 'Khách A', 'email' => 'khacha@example.com', 'phone' => '0901234567', 'spent' => 5000000],
            ['name' => 'Khách B', 'email' => 'khachb@example.com', 'phone' => '0902234567', 'spent' => 4000000],
        ];

        // 5. Top sản phẩm bán chạy
        $topProducts = [
            ['name' => 'Sản phẩm A', 'sold' => 50],
            ['name' => 'Sản phẩm B', 'sold' => 40],
        ];

        // Truyền dữ liệu sang View
        return view('Front-end-Admin.statistical.index', compact(
            'chartData',
            'statusData',
            'dailyRevenue',
            'totalRevenue',
            'topCustomers',
            'topProducts'
        ));
    }
}
