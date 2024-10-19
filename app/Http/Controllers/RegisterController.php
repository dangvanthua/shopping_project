<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\ValidEmail;

class RegisterController extends Controller
{
    // Hiển thị form đăng ký
    public function showRegistrationForm()
    {
        return view('Front-end-Admin.auth.register');
    }

    // Xử lý đăng ký
    public function register(Request $request)
    {
        // Validation
        $this->validator(data: $request->all())->validate();

        // Tạo người dùng mới
        $user = $this->create($request->all());

        // Đăng nhập ngay sau khi đăng ký
        auth()->login($user);

        // Chuyển hướng sau khi đăng ký
        return redirect()->route('home'); // Chuyển hướng đến trang chủ sau đăng ký
    }

    // Validation dữ liệu
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:customer', new ValidEmail()],
            'phone' => ['required','string','regex:/^0[1-9][0-9]{8}$/',],
            'password' => ['required', 'string', 'min:8'],
            'confirmpassword' => ['required', 'same:password'],
        ]);
    }

    // Tạo user mới
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
