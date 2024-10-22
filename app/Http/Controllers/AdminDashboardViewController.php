<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardViewController extends Controller
{
    //Hiện thị theme trang dashboard
    public function showThemeDashBoard()
    {
        return view('Front-end-Admin.transaction.dashboard');
    }
}
