<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function getItemsProduct($id_product)
    {
        $product = Product::findOrFail($id_product);
        if (!$product) {
            return response()->json([
                'message' => "Giá trị không tồn tại",
            ], 404);
        }
        return response()->json([
            'message' => "Giá trị hợp lệ",
            'data' => $product,
        ], 200);
    }

    public function getAllProducts()
    {
        $products = DB::table('product')->paginate(5);

        return response()->json($products);
    }

    public function toggleStatus(Request $request, $id)
    {
        $product = DB::table('product')->find($id);
        $product->product_status = $request->status;
        $product->save();

        return response()->json(['message' => 'Trạng thái sản phẩm đã được cập nhật!']);
    }

    public function delete($id)
    {
        DB::table('product')::destroy($id);
        return response()->json(['message' => 'Sản phẩm đã được xóa!']);
    }
}
