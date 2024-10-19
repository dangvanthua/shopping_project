<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Authrequest;
class RegistController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('Front-end-Admin.auth.register');
    }

    public function register(Authrequest $request){
        $info =[
            'email'=>$request->input('phoneNo'),
        ];
        if(Auth::attempt($info)){
            die();
        }
        else{
            return redirect()->route('register');
        }
    }
}
