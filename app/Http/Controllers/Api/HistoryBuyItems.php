<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HistoryBuyItems extends Controller
{
    //
    //Hiển thị danh sách đơn hàng
    public function getAllBuyItemsHistory()
    {
        $buyItems = null;
        if (auth()->check()) {
            $id_customer = auth()->id();
            $buyItems = Order::where('id_customer', $id_customer)
                ->with('orderStatusHistory')
                ->get();
        } else {
            $id_session = Session()->getid();
            $buyItems = Order::where('id_session', $id_session)
                ->with('orderStatusHistory')
                ->get();
        }
        if ($buyItems->isNotEmpty()) {
            return response()->json([
                'message' => "Đã có dữ liệu mua hàng",
                'data' => $buyItems
            ], 200);
        }
        return response()->json([
            'message' => "Không có dữ liệu mua hàng"
        ], 404);
    }

    //Chi tiết lịch sử đặt hàng
    public function getDetailHistoryItems($id_order)
    {
        $detail_items = null;
        if (auth()->check()) {
            $id_customer = auth()->id();
            $detail_items = Order::with('orderItems.product')
                ->where('id_order', $id_order)
                ->where('id_customer', $id_customer)
                ->first();
        } else {
            $id_session = Session()->getid();
            $detail_items = Order::with('orderItems.product')
                ->where('id_order', $id_order)
                ->where('id_session', $id_session)
                ->first();
        }

        if ($detail_items) {
            return response()->json([
                'message' => "Lấy dữ liệu thành công",
                'data' => $detail_items
            ], 200);
        }

        return response()->json([
            'message' => "Chưa lấy được dữ liệu"
        ], 404);
    }
}
