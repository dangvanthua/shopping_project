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
    // public function getViewItemDashboard()
    // {
    //     $item = OrderItem::with('product','order.customer','order.payment')->get();
    //     return response()->json([
    //         'message' => 'Thành công',
    //         'data' => $item
    //     ]);
    // }

    public function getViewItemDashboard($id)
    {
        $item = Order::with('customer')->find($id);
        return response()->json($item);
    }

    // @thực thi cập nhật trạng thái đơn hàng
    public function updateStatusOrderDashBoard(Request $request, $id)
    {
        $item = $request->items;
        forEach($item as $itemOrder)
        {
            $data = OrderItem::find($itemOrder['id_order_item']);
            if($data)
            {
                $data->status = $itemOrder['status'];
                $data->save();
                return response()->json([
                    'message' => 'Cập nhật thành công',
                ],200);
            }
            else{
                return response()->json([
                    'message' => 'Cập nhật thất bại',
                ],404);
            }
        }

    }

}
