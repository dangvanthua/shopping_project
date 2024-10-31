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


    public function getCartItems(Request $request)
    {
      
        $id_session = session()->getId();
        $id_customer = auth()->check() ? auth()->id() : null;

        // Lấy sản phẩm trong giỏ hàng theo id_session hoặc id_customer
        $cartItems = ShoppingCart::with('product')
            ->where(function ($query) use ($id_session, $id_customer) {
                $query->where('id_session', $id_session);
                if ($id_customer) {
                    $query->orWhere('id_customer', $id_customer);
                }
            })
            ->get();
    
        if ($cartItems->isEmpty()) {
            return response()->json([
                'message' => 'Không có sản phẩm trong giỏ hàng'
            ], 404);
        }

        return response()->json($cartItems);
    }

}
