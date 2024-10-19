<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AttributeViewController extends Controller
{
    //
    public function showThemmeAttribute()
    {
        return view('Front-end-Admin.attribute.index');
    }
}
