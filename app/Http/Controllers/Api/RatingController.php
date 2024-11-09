<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    //
    public function getAllRatings()
    {
        $review = Review::with('product', 'customer')->paginate(3);
        if ($review) {
            return response()->json([
                'message' => "Lấy dữ liệu thành công",
                'data' => $review
            ], 200);
        }
    }

    // viết hàm xoá rating
    public function deleteItemsReview($id)
    {
        $itemsrating = Review::find($id);
        if ($itemsrating) {
            $itemsrating->delete();
            return response()->json([
                'message' => "Xoá dữ liệu thành công",
                'data' => $itemsrating

            ], 200);
        } else {
            return response()->json([
                'message' => "Có lỗi xoá dữ liệu"
            ], 404);
        }
    }
    //@thực thi tìm kiếm
    public function fullTextSearchRatings(Request $request)
    {
        // Lấy từ khóa tìm kiếm từ query parameter 'key'
        $value = $request->input('key');
        // Thực hiện truy vấn full-text search
        $fullTextSearch = Review::with(['customer', 'product'])
            ->search($value)
            ->get();

        // Kiểm tra nếu không có kết quả nào được tìm thấy
        if ($fullTextSearch->isEmpty()) {
            return response()->json([
                'message' => "Không tìm thấy dữ liệu"
            ], 404);
        }
        // Trả về kết quả tìm kiếm thành công
        return response()->json([
            'message' => 'Lấy dữ liệu thành công',
            'data' => $fullTextSearch
        ], 200);
    }
}
