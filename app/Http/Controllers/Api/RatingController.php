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
        $review = Review::with('product','customer')->paginate(5);
        if($review)
        {
            return response()->json([
                'message' => "Lấy dữ liệu thành công",
                'data' => $review
            ],200);
        }
    }

    // viết hàm xoá rating
    public function deleteItemsReview($id)
    {
        $itemsrating = Review::find($id);
        if($itemsrating)
        {
            $itemsrating->delete();
            return response()->json([
                'message' => "Xoá dữ liệu thành công",
                'data' => $itemsrating

            ],200);
        }
        else{
            return response()->json([
                'message' => "Có lỗi xoá dữ liệu"
            ],404);
        }
    }
}
