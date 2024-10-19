<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    //

    public function getDataJson()
    {
        $attributes = Attribute::paginate(1); // Phân trang, mỗi trang 10 item
        return response()->json($attributes);
    }
}
