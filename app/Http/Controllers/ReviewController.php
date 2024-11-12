<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\OrderItem;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('id_product', 1)
            ->with('customer')
            ->get();
        return view('Front-end-Shopping.product_detail', compact('reviews'));
    }

    public function saveReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_product' => 'required|integer',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => [
                'required',
                'string',
                'regex:/^(?!.*\s{2,}).*$/'
            ],
        ], [
            'rating.required' => 'Please select a rating.',
            'comment.required' => 'Please enter your review.',
            'comment.regex' => 'Please avoid multiple consecutive spaces in your comment.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }


        // Kiểm tra nếu sản phẩm thuộc đơn hàng đã giao của người dùng
        $orderItem = OrderItem::where('id_product', $request->id_product)
            ->whereHas('order', function ($query) {
                $query->where('id_customer', 1) // Giả sử ID của khách hàng hiện tại là 1
                    ->where('status', 'đã giao hàng'); // Trạng thái giao hàng
            })
            ->first();

        if (!$orderItem) {
            return response()->json([
                'success' => false,
                'error' => 'You can only review products from delivered orders.',
            ], 403);
        }

        // Tạo đánh giá mới
        $reviewData = array_merge($validator->validated(), ['id_customer' => 1]);
        $review = Review::create($reviewData);

        $customer = Customer::find(1);

        return response()->json([
            'success' => true,
            'review' => $review,
            'customer' => [
                'name' => $customer->name,
            ]
        ]);
    }

    public function updateReview(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required|integer|min:1|max:5',
            'comment' => [
                'required',
                'string',
                'regex:/^(?!.*\s{2,}).*$/'
            ],
        ], [
            'rating.required' => 'Please select a rating.',
            'comment.required' => 'Please enter your review.',
            'comment.regex' => 'Please avoid multiple consecutive spaces in your comment.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        $review = Review::find($id);

        if ($review) {
            $review->update($validator->validated());

            return response()->json([
                'success' => true,
                'review' => $review,
            ]);
        }

        return response()->json(['success' => false, 'message' => 'Review not found'], 404);
    }

    public function removeReview($id)
    {
        $review = Review::find($id);

        if ($review) {
            $review->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Review not found'], 404);
    }
}
