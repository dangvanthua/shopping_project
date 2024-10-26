<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class AdminDashboardViewController extends Controller
{
    //Hiện thị theme trang dashboard
    public function showThemeDashBoard()
    {
        return view('Front-end-Admin.transaction.dashboard');
    }

    // hiện thị toàn bộ đơn hàng
    public function showIndexDashBoard()
    {
        return view('Front-end-Admin.transaction.index');
    }

    // hiện thị view dashboard
    // public function showViewDashBoard($id)
    // {
    //     $items = OrderItem::where('product','order.cutomer','order.payment')->find($id);
    //     if(!$items)
    //     {
    //         echo "Ko có gì nha";
    //     }
    //     return view('Front-end-Admin.transaction.view',compact('items'));
    // }

    //@hiện thị view chi tiết @todo
    public function showViewDashBoard($id)
    {
        // biên dịch lại id để hiển thị
        try {
            $decryptedId = Crypt::decrypt($id);
            $items = Order::findOrFail($decryptedId);
            // Trả về view hiển thị, truyền dữ liệu sang view
            return view('Front-end-Admin.transaction.view', compact('items'));
        } catch (\Exception $e) {
            return abort(404, 'Dữ liệu chưa hợp lệ');
        }
    }
}
