<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

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
    public function showViewDashBoard($id)
    {
        $items = OrderItem::where('product','order.cutomer','order.payment')->find($id);
        if(!$items)
        {
            echo "Ko có gì nha";
        }
        return view('Front-end-Admin.transaction.view',compact('items'));
    }


}
