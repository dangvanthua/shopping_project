<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RatingViewController extends Controller
{
    //
    public function showViewRating()
    {
        return view('Front-end-Admin.rating.index');
    }
}
