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

    //@hiện thị view chi tiết
    public function showViewDashBoard($id)
    {
        $items = Order::findOrFail($id);
        if(!$items)
        {
            return abort(404, 'Order not found');
        }
        // Trả về view hiển thị, truyền dữ liệu sang view
        return view('Front-end-Admin.transaction.view',compact('items'));
    }

    // lấy dữ liệu json thực thi bên js
    public function getViewItemDashboard($id)
    {
        $items = Order::with('customer')->find($id);
        if(!$items)
        {
            return response()->json(['message'  => 'Not Found'],404);
        }
        return response()->json($items);
    }



    //@ lấy chi tiết đơn hàng
    // public function getViewItemDashboard($id)
    // {
    //     // Tìm đơn hàng theo ID
    //     $order = Order::with('customer')->find($id);
    //     // Kiểm tra xem đơn hàng có tồn tại không
    //     if (!$order) {
    //         return response()->json(['message' => 'Order not found'], 404);
    //     }
    //     // Chuẩn bị dữ liệu để trả về
    //     $data = [
    //         'customer' => [
    //             'name' => $order->customer->name,
    //             'email' => $order->customer->email,
    //             'phone' => $order->customer->phone,
    //             'address' => $order->customer->address,
    //         ],
    //         'status' => $order->status,
    //         'total_item' => $order->total_item,
    //     ];
    //     // Trả về dữ liệu dưới dạng JSON
    //     return response()->json($data);
    // }

    // @xử lý update trạng thái
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



    //@show giao diện chi tiết view

}
