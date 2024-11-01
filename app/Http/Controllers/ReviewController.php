<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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
}
