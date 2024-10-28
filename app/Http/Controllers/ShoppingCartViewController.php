<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShoppingCartViewController extends Controller
{
    // hiển thị view trang giỏ hàng

    public function showViewShopping_Cart()
    {
        return view('Front-end-Shopping.shopping_cart');
    }

    // test giao diện lại để demo
    public function showDemoNha()
    {
        $items = Product::paginate(2);
        return view('Front-end-Shopping.demo01',compact('items'));
    }
}
