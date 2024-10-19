<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Authrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phoneNo' => 'required|string|regex:/^0[1-9][0-9]{8}$/',
        ];
    }
    public function messages(): array
    {
        return [
            'phoneNo.required'=>'Bạn chưa nhập sdt',
            'phoneNo.string'=>'Không phải chuỗi',
            'phoneNo.regex'=>'Số điện thoại phải có 10 ký tự, phải có'
        ];
    }
}
