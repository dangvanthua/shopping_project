<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class PayMonneyController extends Controller
{
    //// thực hiện thực thi để thanh toán
    public function makePaymentAllItems()
    {
        try {
            $cartItems = null;
            if (auth()->check()) {
                $id_customer = auth()->id();
                $cartItems = ShoppingCart::where('id_customer', $id_customer)
                    ->with('product')
                    ->get();
            } else {
                $id_session = session()->getId();
                $cartItems = ShoppingCart::where('id_session', $id_session)
                    ->with('product')
                    ->get();
            }

            // Kiểm tra nếu giỏ hàng trống
            if ($cartItems->isEmpty()) {
                return response()->json(['message' => 'Giỏ hàng của bạn trống'], 400);
            }

            // Định dạng lại dữ liệu giỏ hàng
            $cartItems = $cartItems->map(function ($item) {
                return [
                    'id_product' => $item->id_product,
                    'product_name' => $item->product->name, // Tên sản phẩm từ bảng `products`
                    'quantity' => $item->quantity,
                    'price' => $item->price,
                    'total_price' => $item->total_price,
                    
                ];
            });

            return response()->json($cartItems, 200);
        } catch (\Exception $e) {
            // Xử lý lỗi và trả về thông báo lỗi
            return response()->json(['message' => 'Đã xảy ra lỗi trong quá trình thanh toán', 'error' => $e->getMessage()], 500);
        }
    }
}
