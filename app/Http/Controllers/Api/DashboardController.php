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

    // lấy giá trị đơn hàng
    public function getItemDashBoard(){
        $items = OrderItem::with('product','order.customer','order.payment')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $items
        ]);
    }

    //


    public function getAllItemDashboard()
    {
        $item = OrderItem::with('product','order.customer','order.payment')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $item
        ]);
    }

}
