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
    public function showViewModelCart($id)
    {
        $items = Product::findOrFail($id);
        return view('Front-end-Shopping.model_shopping_cart',compact('items'));
    }

    // test giao diện demo
    public function showDemoNha()
    {
        $product = Product::paginate(3);
        return view('Front-end-Shopping.demo',compact('product'));
    }

    // hiển thị giao diện chi tiết sản phẩm
    public function showViewProductDetail()
    {
        return view('Front-end-Shopping.product_detail');
    }
}
