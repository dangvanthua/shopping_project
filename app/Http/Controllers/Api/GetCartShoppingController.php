<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GetCartShoppingController extends Controller
{
    //lấy sản phẩm trong giỏ hàng
    public function getItemsCartShopping(Request $request)
    {
        Log::info("Lấy giá trị id_session lần đầu nè: " . session()->getId());
        $cartItems = null;
        if (auth()->check()) {
            // Nếu người dùng đã đăng nhập, lấy giỏ hàng theo `id_product`
            $userId = auth()->id();
            $cartItems = ShoppingCart::where('id_customer', $userId)
                ->with('product') // Lấy thêm thông tin sản phẩm từ bảng `products`
                ->get();
        } else {
            // Nếu chưa đăng nhập, lấy giỏ hàng theo `id_session`
            $id_session = session()->getId();

            dd([
                'session_id' => $id_session,
                'cartItems' => $cartItems
            ]);
            die();

            Log::info("Lấy giá trị id_session nè: " . $id_session);

            $cartItems = ShoppingCart::where('id_session', $id_session)
                ->with('product') // Lấy thêm thông tin sản phẩm từ bảng `products`
                ->get();
        }
        // Chuyển đổi dữ liệu để dễ dàng hiển thị ở phía client
        $cartItems = $cartItems->map(function ($item) {
            return [
                'id_product' => $item->id_product,
                'product_name' => $item->product->name, // Tên sản phẩm từ bảng `products`
                'quantity' => $item->quantity,
                'price' => $item->price,
                'total_price' => $item->total_price,
            ];
        });
        return response()->json($cartItems);
    }

    // Controller method for getting cart items
    // public function getItemsCartShopping(Request $request)
    // {
    //     // $id_session = session()->getId();
    //     // $id_customer = auth()->check() ? auth()->id() : null;
    //     $id_session = $request->input('session_id') ?? session()->getId();
    //     $id_customer = auth()->check() ? auth()->id() : null;

    //     $cartItems = ShoppingCart::where(function ($query) use ($id_session, $id_customer) {
    //         if ($id_customer) {
    //             $query->where('id_customer', $id_customer);
    //         } else {
    //             $query->where('id_session', $id_session);
    //         }
    //     })->with('product')->get();
    //     Log::info("Session ID in getItems: " . $id_session);
    //     dd([
    //         'session_id' => $id_session,
    //         'cartItems' => $cartItems
    //     ]);
    //     die();
    //     $cartItems = $cartItems->map(function ($item) {
    //         return [
    //             'id_product' => $item->id_product,
    //             'product_name' => $item->product->name,
    //             'quantity' => $item->quantity,
    //             'price' => $item->price,
    //             'total_price' => $item->total_price,
    //         ];
    //     });

    //     return response()->json($cartItems);
    // }
}
