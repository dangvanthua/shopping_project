<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Lấy data dưới dạng json
    public function getDataDashboardJson()
    {
        $dashboard = Order::all();
        return response()->json([
            'message' => 'Thành công',
            'data' => $dashboard
        ]);
    }

    public function getItemDashBoard(){
        $orderItems = OrderItem::with('product','order')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $orderItems
        ]);
    }

    // public function getItemDashBoard(){
    //     $orderItems = Order::with('product')->get();
    //     return response()->json([
    //         'message' => 'Thành công',
    //         'data' => $orderItems
    //     ]);
    // }
}
