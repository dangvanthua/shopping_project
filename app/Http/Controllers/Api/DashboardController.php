<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //Lấy data dưới dạng json
    public function getDataDashboardJson()
    {
        $dashboard = Order::all();
        return response()->json([
            'message' => 'Thành công',
            'data' => $dashboard
        ]);
    }
}
