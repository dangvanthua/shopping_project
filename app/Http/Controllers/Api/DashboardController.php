<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class DashboardController extends Controller
{
    // lấy giá trị đơn hàng dưới dạng json
    public function getItemDashBoard()
    {
        $items = OrderItem::with('product', 'order.customer', 'order.payment')->get();
        return response()->json([
            'message' => 'Thành công',
            'data' => $items
        ]);
    }

    // lấy danh sách đơn hàng
    public function getAllItemDashboard()
    {
        $item = OrderItem::with('product', 'order.customer', 'order.payment')->get();
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
    // public function updateStatusOrderDashBoard(Request $request, $id)
    // {
    //     // Nếu không có items trong request, trả về lỗi
    //     if (!$request->has('items') || empty($request->items)) {
    //         return response()->json([
    //             'message' => 'Không có dữ liệu đơn hàng'
    //         ], 400);
    //     }


    // public function updateStatusOrderDashBoard(Request $request, $id)
    // {
    //     // Kiểm tra xem dữ liệu 'status' có tồn tại không
    //     if (!$request->has('status')) {
    //         return response()->json(['message' => 'Status is required'], 400);
    //     }

    //     // Lấy đơn hàng theo ID
    //     $order = OrderItem::find($id);
    //     if (!$order) {
    //         return response()->json(['message' => 'Order not found'], 404);
    //     }

    //     // Cập nhật trạng thái đơn hàng
    //     $order->status = $request->input('status');
    //     $order->save();
    //     return response()->json(['message' => 'Cập nhật thành công'], 200);
    // }

    // public function updateStatusOrderDashBoard(Request $request, $id)
    // {
    //     // kiểm tra trường status
    //     if(!$request->has('status'))
    //     {
    //         return response()->json(['message' => 'Status is required'], 400);
    //     }

    //     // Tìm theo Id
    //    $items = OrderItem::find($id);
    //    if(!$items)
    //    {
    //     return response()->json(['message' => 'Not Found'], 404);
    //    }

    //    $items->status = $request->input('status');
    //    $items->save();
    //    return response()->json(['message' => 'Cập nhật thành công'], 200);

    // //    lấy id tương ứng
    // $key = Order::where($items->id_order);

    // //@ thực thi cập nhật trạng thái cho đơn hàng
    // $orders = OrderItem::where('order_id',$items->id)->get();

    // // kiểm tra toàn bộ trạng thái của order_item trong đơn hàng
    // $checkAllItems = $orders->every(function($value) use ($request){
    //     return $value->status === $request->input('status');
    // });

    // // Có cùng trạng thái thì cập nhật toàn bộ
    // if($checkAllItems)
    // {
    //     $key->status = $request->input('status');
    //     $key->save();
    // }

    // }

    public function updateStatusOrderDashBoard(Request $request, $id)
    {
        // Kiểm tra xem trường status có tồn tại hay không
        if (!$request->has('status')) {
            return response()->json(['message' => 'Status is required'], 400);
        }

        // Tìm OrderItem theo id_order_item
        $items = OrderItem::find($id);
        if (!$items) {
            return response()->json(['message' => 'Not Found'], 404);
        }

        // Cập nhật trạng thái cho OrderItem
        $items->status = $request->input('status');
        $items->save();

        // Tìm đơn hàng (Order) tương ứng với id_order trong OrderItem
        $key = Order::find($items->id_order);  // Đảm bảo rằng `id_order` là khóa ngoại của `order`
        if (!$key) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Lấy tất cả các OrderItem của đơn hàng này
        $orders = OrderItem::where('id_order', $items->id_order)->get();

        // Kiểm tra xem tất cả các OrderItem có cùng trạng thái với trạng thái mới hay không
        $checkAllItems = $orders->every(function ($value) use ($request) {
            return $value->status === $request->input('status');
        });

        // Nếu tất cả các OrderItem có cùng trạng thái, cập nhật trạng thái của Order
        if ($checkAllItems) {
            $key->status = $request->input('status');
            $key->save();
        }

        return response()->json(['message' => 'Cập nhật thành công'], 200);
    }
}
