<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

class GetCartShoppingController extends Controller
{
    //lấy sản phẩm trong giỏ hàng
    // public function getItemsCartShopping(Request $request)
    // {
    //     // lấy id session
    //     $id_session = session()->getId();
    //     // lấy id_customer
    //     $id_customer = auth()->check() ? auth()->id() : null;

    //     $cartItems = ShoppingCart::with('product')->where(function($query) use ($id_session,$id_customer){
    //         $query->where('id_session',$id_session);

    //         if($id_customer)
    //         {
    //             $query->where('id_customer',$id_customer);
    //         }
    //     })->get();
    //     return response()->json($cartItems);
    // }

    public function getItemsCartShopping(Request $request)
    {
        // Lấy session ID cố định từ session Laravel (vì route đã chuyển sang web.php)
        $id_session = session()->getId();

        // Truy vấn giỏ hàng dựa trên session ID
        $cartItems = ShoppingCart::where('id_session', $id_session)->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                'message' => 'Không có sản phẩm trong giỏ hàng'
            ], 404);
        }

        return response()->json($cartItems);
    }

}
