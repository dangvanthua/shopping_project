<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class GetCartShoppingController extends Controller
{
    // //lấy sản phẩm trong giỏ hàng
    public function getItemsCartShopping(Request $request)
    {
        $cartItems = null;
        if (auth()->check()) {
            // Nếu người dùng đã đăng nhập, lấy giỏ hàng theo `id_customer`
            $userId = auth()->id();
            $cartItems = ShoppingCart::where('id_customer', $userId)
                ->with('product') // Lấy thêm thông tin sản phẩm từ bảng `products`
                ->get();
        } else {
            // Nếu chưa đăng nhập, lấy giỏ hàng theo `session_id`
            $id_session = Session::getId();
            // Log::info("thực thi lấy giá trị id_session: " . $id_session);
            $cartItems = ShoppingCart::where('id_session', $id_session)
                ->with('product') // Lấy thêm thông tin sản phẩm từ bảng `products`
                ->get();
        }

        // Chuyển đổi dữ liệu để dễ dàng hiển thị ở phía client
        $cartItems = $cartItems->map(function ($item) {
            return [
                'id_product' => $item->id_product,
                'product_name' => $item->product->name ?? 'Sản phẩm không tồn tại', // Kiểm tra product
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total_price' => $item->total_price,
            ];
        });
        return response()->json($cartItems);
    }
}
