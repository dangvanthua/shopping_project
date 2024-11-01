<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class GetAllItemsShoppingCart extends Controller
{
    //viết lấy danh sách giỏ hàng json
    public function getAllItemsShoppingCart()
    {
        $cartItems = null;
        if(auth()->check())
        {
            $userId = auth()->id();
            $cartItems = ShoppingCart::where('id_customer',$userId)
            ->with('product')->get();
        }
        else{
            $id_session = session()->getId();
            $cartItems = ShoppingCart::where('id_session',$id_session)->with('product')->get();
        }
        // kiểm tra nếu giỏ hàng rỗng
        if($cartItems->isEmpty())
        {
            return response()->json([
                'message' => "Giỏ hàng không có giá trị"
            ],404);
        }

        return response()->json([
            'message' => "Thành công",
            'data' => $cartItems
        ],200);


    }
}
