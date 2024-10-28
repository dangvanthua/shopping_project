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
use Illuminate\Support\Facades\Validator;
class CategoryProductController extends Controller
{

 

    public function index()
    {
        $categories =DB::table('tbl_category_product')->paginate(5);
        return response()->json(['data' => $categories], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:50',
            'category_desc' => 'required|max:1000',
        ]);

        $category = CategoryProductController::create($validatedData);
        return response()->json(['message' => 'Danh mục sản phẩm đã được tạo thành công!', 'data' => $category], 201);
    }

    public function update(Request $request, $id)
    {
        $category = CategoryProductController::findOrFail($id);
        $validatedData = $request->validate([
            'category_name' => 'required|max:50',
            'category_desc' => 'required|max:1000',
        ]);

        $category->update($validatedData);
        return response()->json(['message' => 'Danh mục sản phẩm đã được cập nhật!', 'data' => $category], 200);
    }

    public function destroy($id)
    {
        $category = CategoryProductController::findOrFail($id);
        $category->delete();
        return response()->json(['message' => 'Danh mục sản phẩm đã được xóa!'], 200);
    }

    public function activate($id)
    {
        $category = CategoryProductController::findOrFail($id);
        $category->update(['category_status' => 0]);
        return response()->json(['message' => 'Danh mục sản phẩm đã được kích hoạt!'], 200);
    }

    public function deactivate($id)
    {
        $category = CategoryProductController::findOrFail($id);
        $category->update(['category_status' => 1]);
        return response()->json(['message' => 'Danh mục sản phẩm đã được vô hiệu hóa!'], 200);
    }
}


