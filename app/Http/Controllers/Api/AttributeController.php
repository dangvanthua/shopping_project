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
        $atttibute = Attribute::all();
        return response()->json($atttibute);
    }
}
