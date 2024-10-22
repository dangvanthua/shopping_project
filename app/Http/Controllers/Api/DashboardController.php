<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // lấy giá trị đơn hàng dưới dạng json
    public function getItemDashBoard(){
        $items = OrderItem::with('product','order.customer','order.payment')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $items
        ]);
    }

    // lấy danh sách đơn hàng
    public function getAllItemDashboard()
    {
        $item = OrderItem::with('product','order.customer','order.payment')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $item
        ]);
    }

    //@ lấy chi tiết đơn hàng
    public function getViewItemDashboard()
    {
        $item = OrderItem::with('product','order.customer','order.payment')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $item
        ]);
    }

}
