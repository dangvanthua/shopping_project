<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class HistoryBuyItems extends Controller
{
    //
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
}
