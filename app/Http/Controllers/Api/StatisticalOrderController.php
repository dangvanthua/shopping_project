<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticalOrderController extends Controller
{
    //
    public function orderByStatus()
    {
        $orders = Order::select(
            'status', // Trường trạng thái
            DB::raw('COUNT(*) as count') // Tính tổng số lượng đơn hàng
        )
        ->groupBy('status') // Nhóm theo trạng thái
        ->get();

        return response()->json([
            'message' => "Lấy dữ liệu thành công",
            'data' => $orders,
        ],200);
    }

    //biểu đồ doanh thu theo tháng
    public function revenueByMonth()
    {
        $revenue = Order::where('status', '!=','Huỷ')
        ->select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('SUM(total_item) as total_revenue') // tổng doanh thu
        )
        ->groupBy('month')
        ->orderBy('month')
        ->get();
        return response()->json([
            'message' => 'Lấy dữ liệu thành công',
            'data' => $revenue,
        ], 200);
    }
}
