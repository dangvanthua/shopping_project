<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;

class AttributeController extends Controller
{
    //
    public function getDataJson()
    {
        $attributes = Attribute::paginate(3);
        return response()->json($attributes);
    }

    // thực thi xoá attribute
    public function deteleDataAttribute($id)
    {
        $attribute = Attribute::find($id);

        if ($attribute) {
            $attribute->delete();
            return response()->json(['message' => 'Xoá thành công!'], 200);
        } else {
            return response()->json(['message' => 'Không tìm thấy phần tử!'], 404);
        }
    }

    public function showCreateAttribute()
    {
        return view('Front-end-Admin.attribute.create')->render();
    }

    public function createDataAttribute(Request $request)
    {
        // // Kiểm tra và validate dữ liệu đầu vào
        $request->validate([
            'attributename' => 'required|max:255',
            'attributedescription' => 'required',
        ]);

        // Tạo mới một bản ghi attribute
        $attribute = new Attribute();
        $attribute->name = $request->input('attributename');
        $attribute->describe = $request->input('attributedescription');
        $attribute->save();

        // Trả về response dưới dạng JSON
        return response()->json([
            'message' => 'Thêm mới thành công!',
            'data' => $attribute
        ], 200);
    }
}
