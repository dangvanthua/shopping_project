<?php

namespace App\Http\Controllers;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Support\Facades\Redirect;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;

class CategoryProductController extends Controller
{

 public function api_all_category_product()
 {
     // Lấy tất cả danh mục sản phẩm với phân trang
     $all_category_product = DB::table('tbl_category_product')->paginate(2);

     // Trả về dữ liệu dưới dạng JSON
     return response()->json($all_category_product);
 }

}


